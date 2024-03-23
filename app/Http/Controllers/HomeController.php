<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $role = auth()->user()->role;
        if ($role == 1) {
            return view('home.dinas.index', [
                'title' => 'Halaman utama admin',
            ]);
        } else {
            return view('home.pengguna.index', [
                'title' => 'Halaman utama'
            ]);
        }
        
    }

    public function layanan(){
        return view('layanan.index', [
            'title' => 'Layanan'
        ]);
    }

    public function jsonLayanan(){
        $layanan = JenisLayanan::all();
        return response()->json(['data' => $layanan]);
    }
}   
