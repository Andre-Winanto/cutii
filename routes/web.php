<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\PersetujuanPertamaController;
use App\Models\PersetujuanKedua;
use App\Models\PersetujuanPertama;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth:user');

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::resource('dashboard/datapegawai', PegawaiController::class)->middleware('auth:user');
Route::resource('dashboard/pengajuancuti', PengajuanCutiController::class)->middleware('auth:pegawai');
Route::resource('dashboard/dataatasan', AtasanController::class)->middleware('auth:user');
Route::get('dashboard/persetujuanpertama', [PersetujuanPertamaController::class, 'index'])->middleware('auth:atasan');

Route::get('dashboard/persetujuan', function () {
    return view('dashboardCuti.index');
});

Route::get('dashboard/cuti', function () {
    return view('dashboardCuti.index');
});

Route::get('/test', function () {
    return Auth::guard('user')->user()->name;
});

Route::get('/test2', function () {
    return Auth::guard('pegawai')->user()->nama;
});

Route::get('/test3', function () {
    dd(Auth::guard('atasan')->check());
});

Route::get('/test4', function () {
    dd(Auth::guard()->check());
});

Route::get('/logoutt', function () {
    Auth::guard('pegawai')->logout();
    Auth::guard('user')->logout();
    Auth::guard('atasan')->logout();
    return redirect('/login');
});
