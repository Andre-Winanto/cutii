<?php

namespace App\Http\Controllers;

use App\Models\Atasan;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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
    public function show(Atasan $dataatasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atasan $dataatasan)
    {
        return view('dashboardCrudAtasan.edit', [
            'atasan' => $dataatasan,
            'kelompoks' => Kelompok::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atasan $dataatasan)
    {

        $rules = [
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:20',
            'masa_kerja' => 'required|max:3',
            'golongan' => 'required|max:50',
            'password' => 'required|max:9',
            'ttd' => 'max:5000'
        ];

        if ($request->NIP != $dataatasan->NIP) {
            $rules['NIP'] = 'required|max:18|min:18|unique:atasans';
        }

        if ($request->email != $dataatasan->email) {
            $rules['email'] = 'required|max:20|unique:atasans';
        }

        if ($request->nama_kelompok != $dataatasan->nama_kelompok) {
            $rules['nama_kelompok'] = 'required|unique:atasans';
        }

        $validated = $request->validate($rules);

        // cek apakah file dirubah : 
        if ($request->file('ttd')) {
            // get file : 
            $file = $request->file('ttd');

            $renameNamaFile = uniqid() . '_' . $file->getClientOriginalName();

            // ubah nama ttd pada validated : 
            $validated['ttd'] = $renameNamaFile;

            // hapus ttd lama : 
            File::delete('file/' . $dataatasan->ttd);

            // pindahkan file ttd : 
            $tujuan_upload = 'file';

            $file->move($tujuan_upload, $renameNamaFile);
        }

        $validated['password'] = Hash::make($validated['password']);

        Atasan::where('id', $dataatasan->id)
            ->update($validated);

        return redirect('dashboard/dataatasan')->with('success', 'Data Atasan berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atasan $dataatasan)
    {
        File::delete('file/' . $dataatasan->ttd);

        Atasan::destroy($dataatasan->id);

        return redirect('dashboard/dataatasan')->with('success', 'Data Atasan berhasil dihapus!');
    }
}
