<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\PersetujuanPertama;
use App\Models\PersetujuanKedua;
use App\Models\PengajuanCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PersetujuanPertamaController extends Controller
{
    public function index()
    {
        // Auth::guard('atasan')->user()->nama_kelompok
        return view('dashboardPersetujuanPertama.index', [
            'persetujuanPertamas' => PersetujuanPertama::where('kelompok', 'KTU')->get()
        ]);
    }

    public function show(PersetujuanPertama $data)
    {

        // return $data->pengajuan_cuti_id;
        $x = PengajuanCuti::where('id', $data->pengajuan_cuti_id)->first();
        $nama = Pegawai::where('NIP', $x->NIP)->first();
        return view('dashboardPersetujuanPertama.show', [
            'persetujuanPertama' => $data,
            'nama' => $nama,
        ]);
    }

    public function persetujuan(PersetujuanPertama $data, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required',
            'keterangan' => ''
        ]);

        $dataPerstujuanPertama = PersetujuanPertama::where('id', $data->id)
            ->update($validated);

        return $dataPerstujuanPertama;

        if ($request->status == 'setuju') {
            PersetujuanKedua::create(['persetujuan_pertama_id' => $data->id]);
        } else {
            PengajuanCuti::where('id', $dataPerstujuanPertama->id)
                ->update(['status' => 'ditolak']);
            return 'ditolak';
        }

        return back()->with('success', 'Data perstujuan berhasil di ubah!');
    }
}
