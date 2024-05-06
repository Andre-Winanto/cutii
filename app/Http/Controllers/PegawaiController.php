<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Pegawai;
use App\Models\JatahCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboardCrudPegawai.index', [
            'pegawais' => Pegawai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboardCrudPegawai.create', [
            'kelompoks' => Kelompok::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NIP' => 'required|max:18|min:18|unique:pegawais',
            'nama' => 'required|max:255',
            'jabatan' => 'required',
            'nama_kelompok' => 'required',
            'masa_kerja' => 'required|max:3',
            'golongan' => 'required|max:50',
            'no_hp' => 'required|max:15',
            'ttd' => 'required|max:5000',
            'email' => 'required|max:20|unique:pegawais',
            'password' => 'required|max:9'
        ]);

        // get file : 
        $ttd = $request->file('ttd');

        // ubah nama berkas : 
        $renameNamaFile = uniqid() . '_' . $ttd->getClientOriginalName();

        // ubah nama berkas pada validated : 
        $validated['ttd'] = $renameNamaFile;

        // buat variable nama folder : 
        $tujuan_upload = 'file';

        // lalu pindahkan : 
        $ttd->move($tujuan_upload, $renameNamaFile);

        Pegawai::create($validated);

        JatahCuti::create([
            'NIP' => $validated['NIP'],
            'tahun' => '2024',
            'jatah' => 12
        ]);

        return redirect('dashboard/datapegawai')->with('success', 'Data pegawai berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $datapegawai)
    {

        return view('dashboardCrudPegawai.edit', [
            'pegawai' => $datapegawai,
            'kelompoks' => Kelompok::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $datapegawai)
    {

        // return $request;
        $rules = [
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:20',
            'masa_kerja' => 'required|max:3',
            'nama_kelompok' => 'required',
            'golongan' => 'required|max:50',
            'no_hp' => 'required|max:15',
            'password' => 'required|max:9',
            'ttd' => 'max:5000'
        ];

        if ($request->NIP != $datapegawai->NIP) {
            $rules['NIP'] = 'required|max:18|min:18|unique:pegawais';
        }

        if ($request->email != $datapegawai->email) {
            $rules['email'] = 'required|max:20|unique:pegawais';
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
            File::delete('file/' . $datapegawai->ttd);

            // pindahkan file ttd : 
            $tujuan_upload = 'file';

            $file->move($tujuan_upload, $renameNamaFile);
        }

        // hash password : 
        $validated['password'] = Hash::make($validated['password']);


        Pegawai::where('id', $datapegawai->id)
            ->update($validated);

        return redirect('dashboard/datapegawai')->with('success', 'Data pegawai berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $datapegawai)
    {

        File::delete('file/' . $datapegawai->ttd);

        Pegawai::destroy($datapegawai->id);

        return redirect('dashboard/datapegawai')->with('success', 'Data pegawai berhasil dihapus!');
    }
}
