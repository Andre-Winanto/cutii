<?php

namespace App\Http\Controllers;

use App\Models\Atasan;
use App\Models\Kelompok;
use Illuminate\Http\Request;

class AtasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboardCrudAtasan.index', [
            'atasans' => Atasan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboardCrudAtasan.create', [
            'kelompoks' => Kelompok::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NIP' => 'required|max:18|min:18|unique:pegawais|unique:atasans',
            'nama' => 'required|max:255',
            'jabatan' => 'required',
            'masa_kerja' => 'required|max:3',
            'email' => 'required|max:20|unique:pegawais|unique:atasans',
            'password' => 'required|max:9',
            'nama_kelompok' => 'required|unique:atasans'
        ]);

        Atasan::create($validated);

        return redirect('dashboard/dataatasan')->with('success', 'Data Atasan berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Atasan $atasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atasan $atasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atasan $atasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atasan $atasan)
    {
        //
    }
}
