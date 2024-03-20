<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index', [
            'title' => 'Home',
        ]);
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
