<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
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
});

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('dashboard/datapegawai', PegawaiController::class);
Route::get('dashboard/cuti', function () {
    return view('dashboardCuti.index');
});

Route::get('/test', function () {
    // return Auth::guard('pegawai')->user()->nama;
    return Auth::guard('user')->user()->name;
});

Route::get('/test2', function () {
    return Auth::guard('pegawai')->user()->nama;
    // return Auth::guard('user')->user()->name;
});

Route::get('/test3', function () {
    return Auth::guard()->check();
});

Route::get('/logoutt', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/logoutp', function () {
    Auth::guard('pegawai')->logout();
    return redirect('/login');
});

Route::get('/logouta', function () {
    Auth::guard('user')->logout();
    return redirect('/login');
});
