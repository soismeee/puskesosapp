<?php

namespace App\Http\Controllers;

use App\Models\DesaKelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WilayahController extends Controller
{
    public function index()
    {
        return view('wilayah.index', [
            'title' => 'Wilayah'
        ]);
    }

    public function jsonKecamatan()
    {
        $kecamatan = Kecamatan::all();
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
        $kecamatan->id = Str::uuid()->toString();
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return response()->json(['message' => 'Data kecamatan berhasil ditambahkan']);
    }

    #####################################################################################################################
    public function desaKelurahan($id)
    {
        return view(['wilayah.desa_kelurahan', [
            'title' => 'Desa Kelurahan',
            'kecamatan' => Kecamatan::find($id)
        ]]);
    }
    public function jsonDesaKelurahan($id)
    {
        $dk = DesaKelurahan::where('kec_id', $id)->get();
        return response()->json(['data' => $dk]);
    }
}
