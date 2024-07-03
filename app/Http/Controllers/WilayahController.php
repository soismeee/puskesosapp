<?php

namespace App\Http\Controllers;

use App\Models\DesaKelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WilayahController extends Controller
{
    public function kecamatan()
    {
        return view('wilayah.kecamatan', [
            'title' => 'Wilayah'
        ]);
    }

    public function jsonKecamatan()
    {
        $cari = request('cari');
        $kecamatan = Kecamatan::all();
        if ($cari !== null) {
            $kecamatan = Kecamatan::where('nama_kecamatan', "like", "%".$cari."%")->get();
        }
        return response()->json(['data' => $kecamatan]);
    }

    public function getKecamatan($id)
    {
        try {
            $get_kec = Kecamatan::findOrFail($id);
            return response()->json(['data' => $get_kec]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Data kecamatan tidak ditemukan'], 404);
        }
    }

    public function validasiKecamatan($request)
    {
        $request->validate(
            ['nama_kecamatan' => 'required'],
            ['nama_kecamatan.required' => 'Nama kecamatan tidak boleh kosong']
        );
    }

    public function storeKecamatan(Request $request)
    {
        $this->validasiKecamatan($request);
        $kecamatan = new Kecamatan;
        $kecamatan->kec_id = Str::uuid()->toString();
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return response()->json(['message' => 'Data kecamatan berhasil ditambahkan']);
    }

    public function updateKecamatan(Request $request, $id)
    {
        $this->validasiKecamatan($request);
        $kecamatan = Kecamatan::find($id);
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->update();
        return response()->json(['message' => 'Data kecamatan berhasil diubah']);
    }

    public function destroyKecamatan($id)
    {
        Kecamatan::destroy($id);
        return response()->json(['message' => 'Data kecamatan berhasil dihapus']);
    }

    #####################################################################################################################
    public function desaKelurahan($id)
    {
        return view('wilayah.desa_kelurahan', [
            'title' => 'Desa Kelurahan',
            'kecamatan' => Kecamatan::find($id)
        ]);
    }
    public function jsonDesaKelurahan($id)
    {
        $dk = DesaKelurahan::where('kec_id', $id)->get();
        return response()->json(['data' => $dk]);
    }

    public function getDesaKelurahan($id)
    {
        try {
            $get_dk = DesaKelurahan::findOrFail($id);
            return response()->json(['data' => $get_dk]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Data desa/kelurahan tidak ditemukan'], 404);
        }
    }

    public function validasiDesaKelurahan($request)
    {
        $request->validate(
            ['nama_dk' => 'required'],
            ['nama_dk.required' => 'Nama desa/kelurahan tidak boleh kosong']
        );
    }

    public function storeDesaKelurahan(Request $request)
    {
        $this->validasiDesaKelurahan($request);
        $kecamatan = new DesaKelurahan();
        $kecamatan->dk_id = Str::uuid()->toString();
        $kecamatan->nama_dk = $request->nama_dk;
        $kecamatan->kec_id = $request->kec_id;
        $kecamatan->save();
        return response()->json(['message' => 'Data desa/kelurahan berhasil ditambahkan']);
    }

    public function updateDesaKelurahan(Request $request, $id)
    {
        $this->validasiDesaKelurahan($request);
        $kecamatan = DesaKelurahan::find($id);
        $kecamatan->nama_dk = $request->nama_dk;
        $kecamatan->update();
        return response()->json(['message' => 'Data desa/kelurahan berhasil diubah']);
    }

    public function destroyDesaKelurahan($id)
    {
        DesaKelurahan::destroy($id);
        return response()->json(['message' => 'Data desa/kelurahan berhasil dihapus']);
    }
}
