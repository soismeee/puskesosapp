<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'title' => 'Selamat datang'
        ]);
    }

    public function utama()
    {
        return view('pages.utama', [
            'title' => 'Selamat datang'
        ]);
    }

    public function jenisPelayanan()
    {
        return view('pages.jenis_pelayanan', [
            'title' => 'Jenis Pelayanan',
            'layanan' => JenisLayanan::all()
        ]);
    }

    public function getLayanan($id)
    {
        $getlayanan = JenisLayanan::find($id);
        return response()->json(['data' => $getlayanan]);
    }

    public function jamPelayanan()
    {
        return view('pages.jam_pelayanan', [
            'title' => 'Jam Pelayanan'
        ]);
    }

    public function teknisPengajuan()
    {
        return view('pages.teknis_pengajuan', [
            'title' => 'Teknis Pengajuan'
        ]);
    }

    public function cekPengajuan()
    {
        return view('pages.cek_pengajuan', [
            'title' => 'Cek Pengajuan'
        ]);
    }

    public function getPengajuan($id)
    {
        try {
            $getPengajuan = Pengajuan::with(['jenis_layanan', 'penduduk'])->findOrFail($id);
            return response()->json(['data' => $getPengajuan]);
        } catch (\Throwable $th) {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
    }
}
