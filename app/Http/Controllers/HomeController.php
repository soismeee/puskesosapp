<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function profil(){
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
        }else{
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
}   
