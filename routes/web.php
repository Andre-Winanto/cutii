<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengajuanCutiController;
use App\Models\PengajuanCuti;
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
Route::resource('dashboard/pengajuancuti', PengajuanCutiController::class);

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
    dd(Auth::guard('pegawai')->check());
});

Route::get('/logoutt', function () {
    Auth::guard('pegawai')->logout();
    Auth::guard('user')->logout();
    return redirect('/login');
});
