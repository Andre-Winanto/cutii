<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('pegawai')->attempt($credentials)) {
            return redirect('dashboard/cuti');
        }

        if (Auth::guard('user')->attempt($credentials)) {
            return redirect('/');
        }

        if (Auth::guard('atasan')->attempt($credentials)) {

            if (Auth::guard('atasan')->user()->nama_kelompok == 'Balai') {
                return redirect('dahsboard/persetujuankedua');
            }

            return redirect('dashboard/persetujuan');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
