<?php

namespace App\Http\Controllers;

use App\Models\BerkasPengajuan;
use App\Models\JenisLayanan;
use App\Models\Kecamatan;
use App\Models\Penduduk;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengajuanController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        if ($role == 1) {
            return view('pengajuan.dinas.index', [
                'title' => 'Daftar Pengajuan'
            ]);
        } else {
            return view('pengajuan.pengguna.index', [
                'title' => 'Daftar Pengajuan'
            ]);
        }
    }

    public function riwayat()
    {
        return view('pengajuan.riwayat.index', [
            'title' => 'Daftar Riwayat Pengajuan'
        ]);
    }

    public function json()
    {
        $role = auth()->user()->role;
        if ($role == 1) {
            $status = request('status');
            $pengajuan = Pengajuan::with(['jenis_layanan', 'penduduk']);
            if ($status !== "All") {
                $pengajuan->where('status', $status);
            }
        } else {
            $pengajuan = Pengajuan::with(['jenis_layanan', 'penduduk'])->whereNotIn('status', ['Selesai'])->where('user_id', auth()->user()->id);
        }

        if ($pengajuan->count() > 0) {
            return response()->json(['data' => $pengajuan->get()]);
        } else {
            return response()->json(['message' => 'Tidak ada data disini'], 404);
        }
    }

    public function jsonRiwayat()
    {
        $role = auth()->user()->role;
        if ($role == 1) {
            $status = request('status');
            $pengajuan = Pengajuan::with(['jenis_layanan', 'penduduk'])->where('status', 'Selesai');
            if ($status !== "All") {
                $pengajuan->where('status', $status);
            }
        } else {
            $pengajuan = Pengajuan::with(['jenis_layanan', 'penduduk'])->where('status', 'Selesai')->where('user_id', auth()->user()->id);
        }

        if ($pengajuan->count() > 0) {
            return response()->json(['data' => $pengajuan->get()]);
        } else {
            return response()->json(['message' => 'Tidak ada data disini'], 404);
        }
    }

    public function listPengajuan()
    {
        return view('pengajuan.pengguna.list_pengajuan', [
            'title' => 'List Pengajuan',
            'layanan' => JenisLayanan::all()
        ]);
    }

    public function create($id)
    {
        return view('pengajuan.pengguna.create', [
            'title' => 'Form Pengajuan',
            'kecamatan' => Kecamatan::select('id', 'nama_kecamatan')->get(),
            'layanan' => JenisLayanan::find($id)
        ]);
    }

    public function kodePengajuan($slug)
    {
        $jmldatahariini = Pengajuan::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(8)) , 3,"0") as kodes')->where('tanggal', date('Y-m-d'))->first();
        return $slug . date("ymd") . $jmldatahariini['kodes'];
    }

    public function validasi($request)
    {
        $request->validate(
            [
                'jl_id' => 'required',
                'slug' => 'required',

                'nik' => 'required',
                'kec_id' => 'required',
                'dk_id' => 'required',
                'no_kk' => 'required',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'no_telepon' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',

                'nama_pelapor' => 'required',
                'hubungan_pelapor' => 'required',
                'keperluan' => 'required',
            ],
            [
                'nik.required' => 'NIK tidak boleh kosong',
                'kec_id.required' => 'Kecamatan harus dipilih',
                'dk_id.required' => 'Desa/Kelurahan harus dipilih',
                'no_kk.required' => 'Nomor KK tidak boleh kosong',
                'nama.required' => 'Nama tidak boleh kosong',
                'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
                'no_telepon.required' => 'Nomor telepon harus diisi',
                'jenis_kelamin.required' => 'Jenis kelamin harus dipilih',
                'alamat.required' => 'Alamat tidak boleh kosong',

                'nama_pelapor.required' => 'Nama pelapor harus diisi',
                'hubungan_pelapor.required' => 'Hubungan pelapor tidak boleh kosong',
                'keperluan.required' => 'Keperluan harus diisi',
            ],

        );
    }

    public function store(Request $request)
    {
        $this->validasi($request);
        $penduduk = new Penduduk();
        $penduduk->nik = $request->nik;
        $penduduk->user_id = auth()->user()->id;
        $penduduk->kec_id = $request->kec_id;
        $penduduk->dk_id = $request->dk_id;
        $penduduk->no_kk = $request->no_kk;
        $penduduk->tempat_lahir = $request->tempat_lahir;
        $penduduk->tanggal_lahir = $request->tanggal_lahir;
        $penduduk->nama = $request->nama;
        $penduduk->no_telepon = $request->no_telepon;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->alamat = $request->alamat;
        $penduduk->save();

        $pengajuan = new Pengajuan();
        $pengajuan->id = $this->kodePengajuan($request->slug);
        $pengajuan->user_id = auth()->user()->id;
        $pengajuan->penduduk_nik = $penduduk->nik;
        $pengajuan->jl_id = $request->jl_id;
        $pengajuan->nama_pelapor = $request->nama_pelapor;
        $pengajuan->hubungan_pelapor = $request->hubungan_pelapor;
        $pengajuan->keperluan = $request->keperluan;
        $pengajuan->status = "Pengajuan";
        $pengajuan->tanggal = date("Y-m-d");
        $pengajuan->save();

        foreach ($request->file('berkas') as $key => $file) {
            $file_name = $penduduk->nik . "_" . $request->syarat_pengajuan[$key] . "." . $file->getClientOriginalExtension();
            $file->storeAs('public/berkas_upload/' . $penduduk->nik, $file_name);

            $berkas = new BerkasPengajuan();
            $berkas->id = intval((microtime(true) * 10000));
            $berkas->berkas = $file_name;
            $berkas->pengajuan_id = $pengajuan->id;
            $berkas->syarat_pengajuan = $request->syarat_pengajuan[$key];
            $berkas->save();
        }

        return response()->json(['message' => 'Data berhasil disimpan, silahkan kembali ke menu pengajuan']);
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::with(['jenis_layanan', 'penduduk', 'berkas_pengajuan'])->find($id);

        $jenis_layanan = JenisLayanan::find($pengajuan->jl_id);
        foreach (json_decode($jenis_layanan->syarat) as $key => $value) {
            $berkas = BerkasPengajuan::where('syarat_pengajuan', $key)->where('pengajuan_id', $pengajuan->id)->first();
            $data[] = [
                'layanan' => $value,
                'berkas' => $berkas == null ? "Belum di upload" : $berkas->berkas
            ];
        }

        // return $data;
        return view('pengajuan.dinas.show', [
            'title' => 'Data pengajuan',
            'pengajuan' => $pengajuan,
            'berkas' => $data
        ]);
    }

    public function statusUpdate(Request $request, $id)
    {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->status = $request->status;
        $berkas_dinas = $request->file('berkas_dinas');
        if ($berkas_dinas !== null) {
            $file_name = $berkas_dinas->getClientOriginalName();
            $berkas_dinas->storeAs('public/dokumen_dinas', $file_name);
            $pengajuan->berkas_dinas = $berkas_dinas->getClientOriginalName();
        }
        $pengajuan->update();
        return response()->json(['message' => 'Status pengajuan berhasil diubah']);
    }

    public function destroy($id)
    {
        $pengajuan = Penduduk::find($id); // select penduduk
        Storage::deleteDirectory('public/berkas_upload/'.$id);
        $pengajuan->delete(); // hapus penduduk, otomatis menghapus pengajuan serta berkas pengajuan
        return response()->json(['message' => 'Data pengajuan berhasil dihapus']);
    }
}
