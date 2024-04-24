<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        $layanan = JenisLayanan::all();
        foreach ($layanan as $item) {
            $data[] = [
                'nama_layanan' => $item->nama_layanan,
                'pengajuan' => Pengajuan::where('jl_id', $item->jl_id)->count(),
            ];
        }
        if ($role == 1) {
            return view('home.dinas.index', [
                'title' => 'Halaman utama admin',
                'layanan' => $data,
                'pengajuan' => Pengajuan::with(['jenis_layanan', 'penduduk'])->get()
            ]);
        } else {
            return view('home.pengguna.index', [
                'title' => 'Halaman utama',
                'layanan' => $data,
            ]);
        }
    }

    public function layanan()
    {
        return view('layanan.index', [
            'title' => 'Layanan'
        ]);
    }

    public function jsonLayanan()
    {
        $layanan = JenisLayanan::all();
        return response()->json(['data' => $layanan]);
    }

    public function profil()
    {
        return view('home.profil', [
            'title' => 'Profil Pengguna',
        ]);
    }

    public function update(Request $request)
    {
        $id = auth()->user()->id;
        $name = $request->name;

        $user = User::find($id);
        $dbname = $user->name;

        if ($name == $dbname) {
            return redirect('/profil')->with('error', 'Data tidak ada yang berubah');
        } else {
            $rules = $request->validate([
                'name' => 'required|max:255',
            ]);

            if ($request->password !== null) {
                $rules['password'] = Hash::make($request->password);
            }

            User::where('id', $id)->update($rules);
            Auth::logout();

            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect('/login')->with('success', 'Data pengguna berhasil diubah');
        }
    }

    public function laporan()
    {
        return view('laporan.index', [
            'title' => 'Laporan'
        ]);
    }

    public function getPengajuan($request){
        $request->validate([
            'status' => 'required',
            'rentang_tanggal' => 'required',
        ]);

        $tanggal = $request->rentang_tanggal;
        $awal = mb_substr($tanggal, 0, 10);
        $tgl_awal = mb_substr($awal, 3, 2);
        $bulan_awal = mb_substr($awal, 0, 2);
        $tahun_awal = mb_substr($awal, 6, 12);
        $tanggal_awal = $tahun_awal . "-" . $bulan_awal . "-" . $tgl_awal;

        $akhir = mb_substr($tanggal, 13, 24);
        $tgl_akhir = mb_substr($akhir, 3, 2);
        $bulan_akhir = mb_substr($akhir, 0, 2);
        $tahun_akhir = mb_substr($akhir, 6, 12);
        $tanggal_akhir = $tahun_akhir . "-" . $bulan_akhir . "-" . $tgl_akhir;

        $pengajuan = Pengajuan::with(['jenis_layanan', 'penduduk'])->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        if ($request->status !== "All") {
            $pengajuan->where('status', $request->status);
        }

        return $pengajuan->get();
    }

    public function getLaporan(Request $request)
    {
        $pengajuan = $this->getPengajuan($request);
        if ($pengajuan->count() > 0) {
            return response()->json(['data' => $pengajuan]);
        } else {
            return response()->json(['message' => 'Tidak ada data disini'], 404);
        }
    }

    public function cetakLaporan(Request $request){
        $pengajuan = $this->getPengajuan($request);
        return view('laporan.cetak', [
            'title' => 'Cetak Laporan',
            'pengajuan' => $pengajuan
        ]);
    }
}
