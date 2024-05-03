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

        $validatedKelompok = $request->validate([
            'nama_kelompok' => 'required|unique:kelompoks'
        ]);

        $validated = $request->validate([
            'NIP' => 'required|max:18|min:18|unique:pegawais|unique:atasans',
            'nama' => 'required|max:255',
            'jabatan' => 'required',
            'golongan' => 'required',
            'masa_kerja' => 'required|max:3',
            'email' => 'required|max:20|unique:pegawais|unique:atasans',
            'password' => 'required|max:9',
            'nama_kelompok' => 'required|unique:atasans',
            'ttd' => 'required|max:5000'
        ]);

        // get file : 
        $ttd = $request->file('ttd');

        // ubah nama berkas menggunakan str:random + originNamaBerkas : 
        $renameNamaFile = uniqid() . '_' . $ttd->getClientOriginalName();

        // ubah nama berkas pada validated : 
        $validated['ttd'] = $renameNamaFile;

        // buat variable nama folder : 

        $tujuan_upload = 'file';

        // lalu pindahkan : 
        $ttd->move($tujuan_upload, $renameNamaFile);

        Kelompok::create($validatedKelompok);
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
