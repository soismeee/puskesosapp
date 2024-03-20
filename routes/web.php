<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/', [PagesController::class, 'index']);
route::get('/utama', [PagesController::class, 'utama'])->name('utama');
route::get('/jenis-pelayanan', [PagesController::class, 'jenisPelayanan'])->name('jenis-pelayanan');
route::get('/jam-pelayanan', [PagesController::class, 'jamPelayanan'])->name('jam-pelayanan');
route::get('/teknis-pengajuan', [PagesController::class, 'teknisPengajuan'])->name('teknis-pengajuan');
route::get('/cek-pengajuan', [PagesController::class, 'cekPengajuan'])->name('cek-pengajuan');

// route::get('/pengajuan', [PagesController::class, 'pengajuan'])->name('pengajuan');
// route::get('/form-pengajuan', [PagesController::class, 'formPengajuan'])->name('form-pengajuan');

route::get('/login', [AuthController::class, 'login'])->name('login');
route::get('/register', [AuthController::class, 'register']);
route::post('/auth', [AuthController::class, 'authenticate'])->name('auth');
route::get('/logout', [AuthController::class, 'logout']);
route::post('/registration', [AuthController::class, 'store'])->name('registration');

route::get('/home', [HomeController::class, 'index'])->name('home');

// layanan
route::get('/layanan', [HomeController::class, 'layanan'])->middleware('auth');
route::get('/get_layanan', [HomeController::class, 'jsonLayanan'])->name('get_layanan')->middleware('auth');

// wilayah
route::get('/wilayah', [WilayahController::class, 'index'])->name('wilayah')->middleware('auth');
route::get('/json_kec', [WilayahController::class, 'jsonKecamatan'])->name('json_kec')->middleware('auth');
route::get('/get_kec/{id}', [WilayahController::class, 'getKecamatan'])->name('get_kec')->middleware('auth');
route::post('/save_kec', [WilayahController::class, 'storeKecamatan'])->name('save_kec')->middleware('auth');
route::patch('/update_kec/{id}', [WilayahController::class, 'updateKecamatan'])->name('update_kec')->middleware('auth');

route::get('/dk/{id}', [WilayahController::class, 'DesaKelurahan'])->name('dk')->middleware('auth');
