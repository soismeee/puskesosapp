<?php

namespace App\Http\Controllers;

use App\Models\BerkasPengajuan;
use App\Models\JenisLayanan;
use App\Models\Kecamatan;
use App\Models\Penduduk;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
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

    public function validasi($request)
    {
        $request->validate([
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

            'jl_id' => 'required',
            'nama_pelapor' => 'required',
            'hubungan_pelapor' => 'required',
            'keperluan' => 'required',
        ]);
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
        $pengajuan->id = Str::uuid()->toString();
        $pengajuan->user_id = auth()->user()->id;
        $pengajuan->penduduk_nik = $penduduk->nik;
        $pengajuan->jl_id = $request->jl_id;
        $pengajuan->nama_pelapor = $request->nama_pelapor;
        $pengajuan->hubungan_pelapor = $request->hubungan_pelapor;
        $pengajuan->keperluan = $request->keperluan;
        $pengajuan->status = "Pengajuan";
        $pengajuan->tanggal = date("Y-m-d");
        $pengajuan->save();

        foreach ($request->file('berkas') as $key => $value) {
            // $request->file('berkas')->move('berkas_upload/', $request->file('berkas')->getClientOriginalName());
            // $nama_berkas = $request->file()->store('public/berkas_upload');

            $berkas = new BerkasPengajuan();
            $berkas->id = intval((microtime(true) * 10000));
            $berkas->berkas = "tesss"; // belum selesai
            $berkas->pengajuan_id = $pengajuan->id;
            $berkas->syarat_pengajuan = $request->syarat_pengajuan[$key];
            $berkas->save();
        }

        return response()->json(['message' => 'Data berhasil disimpan']);
    }
}
