<?php

namespace App\Http\Controllers;

use App\Models\JatahCuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class JatahCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JatahCuti $jatahCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JatahCuti $data)
    {
        return view('dashboardcuti/edit', [
            'jatah' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JatahCuti $data)
    {
        $validated = $request->validate([
            'jatah' => 'required|numeric|max:90|min:0'
        ]);

        JatahCuti::where('id', $data->id)->update($validated);

        return redirect('dashboard/datacuti/' . $data->pegawai->id)->with('success', 'Data Jatah Cuti Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JatahCuti $jatahCuti)
    {
        //
    }

    public function tambahJatahTahunan()
    {
        $getTahunTerbesar = JatahCuti::OrderBy('tahun', 'DESC')->first();
        $getTahunTerbesar = $getTahunTerbesar->tahun;
        $getTahunTerbesar = (int) $getTahunTerbesar;

        $tahunSekarang = date('Y');
        $tahunSekarang = (int) $tahunSekarang;

        // jika tahun terbesar lebih kecil dari tahun sekarang :
        if ($getTahunTerbesar < $tahunSekarang) {

            $getDataPegawais = Pegawai::all();

            foreach ($getDataPegawais as $pegawai) {
                JatahCuti::create([
                    'NIP' => $pegawai->NIP,
                    'tahun' => $tahunSekarang,
                    'jatah' => 12
                ]);
            }


            return back()->with('success', 'Data Jatah Cuti Berhasil diubah!');
        }

        return back()->with('errorJatahCuti', 'Tahun Belum Berubah!');
    }
}
