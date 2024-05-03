<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboardSurat.index', [
            'surats' => Surat::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_surat' => 'required|max:15',
            'tanggal_disahkan' => 'required'
        ]);

        Surat::where('id', $request->id)->update($validated);

        return redirect('dashboard/surat')->with('success', 'Data Surat Berhasil Diedit');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $data)
    {
        $getDataPegawai = Pegawai::where('NIP', $data->persetujuanKedua->persetujuanPertama->pengajuanCuti->NIP)->first();

        return view('dashboardSurat.show', [
            'persetujuanKedua' => $data->persetujuanKedua,
            'dataPegawai' => $getDataPegawai,
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        //
    }
}
