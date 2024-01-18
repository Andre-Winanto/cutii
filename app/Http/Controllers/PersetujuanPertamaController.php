<?php

namespace App\Http\Controllers;

use App\Models\PersetujuanPertama;
use Illuminate\Http\Request;

class PersetujuanPertamaController extends Controller
{
    public function index()
    {
        return view('dashboardPersetujuanPertama.index', [
            'persetujuanPertamas' => PersetujuanPertama::all()
        ]);
    }
}
