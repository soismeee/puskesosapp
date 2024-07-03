<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        return view('user_manajemen.index', [
            'title' => 'Kelola Pengguna',
        ]);
    }

    public function json(){
        $user = User::all();
        if ($user !== null) {
            return response()->json(['data' => $user]);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required', 'email' => 'required', 'password' => 'required'],
            ['name.required' => 'Nama pengguna tidak boleh kosong']
        );

        $user = new User();
        $user->id = intval((microtime(true) * 10000));
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();
        return response()->json(['message' => 'Data pengguna berhasil ditambahkan']);
    }

    public function show($id)
    {
        try {
            $get_usr = User::findOrFail($id);
            return response()->json(['data' => $get_usr]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Data user tidak ditemukan'], 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            ['name' => 'required', 'email' => 'required'],
            ['name.required' => 'Nama pengguna tidak boleh kosong']
        );

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status = $request->status == null ? 'non-aktif' : $request->status;
        $user->update();
        return response()->json(['message' => 'Data pengguna berhasil ditambahkan']);
    }

    public function destroy($id)
    {
        //
    }
}
