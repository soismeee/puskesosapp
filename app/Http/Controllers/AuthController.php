<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function register(){
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    public function authenticate(Request $request)
    {
        // dd($request);
        // $credentials = $request->validate(
        // [
        //     'email' => 'required',
        //     'password' => 'required'
        // ],
        // [
        //     'email.required' => 'Email tidak boleh kosong',
        //     'password.required' => 'Password tidak boleh kosong',
        // ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/home');
        // }
        $credentials = $request->only('email', 'password');

        // Coba login dengan email
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            return redirect()->intended('/home');
        }

        // Jika email gagal, coba cari user berdasarkan nomor telepon
        $penduduk = Penduduk::where('no_telepon', $credentials['email'])->first();

        if ($penduduk) {
            $user = User::find($penduduk->user_id);
            if ($user && Auth::attempt(['email' => $user->email, 'password' => $credentials['password']])) {
                return redirect()->intended('/home');
            }
        }

        return back()->with('loginError', 'Email atau password salah!!!');
    }

    public function store(Request $request)
    {   
        // dd($request);
        $vaslidatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ],
        [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Silahkan gunakan email lain',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 5 karakter'
        ]
        );

        $vaslidatedData['id'] = intval((microtime(true) * 10000));
        $vaslidatedData['password'] = Hash::make($vaslidatedData['password']);
        $vaslidatedData['role'] = 2;
        $vaslidatedData['status'] = 'non-aktif';
        User::create($vaslidatedData);
        return redirect('/login')->with('success', 'Berhasil registrasi, silahkan login');
    }

    public function status(Request $request, $id){
        $rules = $request->validate([
            'status' => 'required',
        ]);

        try {
            $pengguna = User::findOrFail($id);
            $pengguna->status = $request->status;
            $pengguna->update();
            return response()->json(['message' => 'Status pengguna berhasil di ubah']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Status pengguna tidak berhasil di ubah']);
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
