<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersetujuanKedua;
use App\Models\JatahCuti;
use App\Models\PengajuanCuti;
use App\Models\Pegawai;
use App\Models\Surat;

use function PHPUnit\Framework\isNull;

class PersetujuanKeduaController extends Controller
{
    public function index()
    {

        return view('dashboardPersetujuanKedua.index', [
            'persetujuanKeduas' => PersetujuanKedua::all()
        ]);
    }

    public function show(PersetujuanKedua $data)
    {

        $getDataPegawai = Pegawai::where('NIP', $data->persetujuanPertama->pengajuanCuti->NIP)->first();

        return view('dashboardPersetujuanKedua.show', [
            'persetujuanKedua' => $data,
            'getDataPegawai' => $getDataPegawai
        ]);
    }

    public function persetujuan(PersetujuanKedua $data, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required',
            'keterangan' => ''
        ]);

        // jika disetujui : 
        if ($validated['status'] == 'setuju') {

            // ::: cuti tahunan : 
            if ($data->persetujuanPertama->pengajuanCuti->jenis_cuti == 'cuti tahunan') {
                // mengecek selisih hari
                $tanggalMulai = date_create($data->persetujuanPertama->pengajuanCuti->tanggal_mulai_cuti);
                $tanggalAkhir = date_create($data->persetujuanPertama->pengajuanCuti->tanggal_akhir_cuti);

                $jumlahCuti = date_diff($tanggalMulai, $tanggalAkhir);
                $jumlahCuti = $jumlahCuti->days + 1;

                $dataNIP = $data->persetujuanPertama->PengajuanCuti->NIP;

                // ambil data jatah tahun : 
                $SisaCuti = JatahCuti::where('NIP', $dataNIP)->get();

                $sisaLiburan = 0;
                foreach ($SisaCuti as $sisa) {
                    $sisaLiburan += $sisa->jatah;
                }

                // jika jatah cuti kurang dari permohonan cuti, maka tolak :
                if ($jumlahCuti > $sisaLiburan) {
                    PengajuanCuti::where('id', $data->persetujuanPertama->pengajuanCuti->id)
                        ->update(['status' => 'tolak']);
                    PersetujuanKedua::where('id', $data->id)
                        ->update(['status' => 'tolak']);
                    return back()->with('errorJumlahCuti', 'Jumlah Cuti Melewati Batas');
                }

                // ambil data jatah cuti berdasarkan 3 tahun yang lalu :
                $tahunSekarang = date('Y');
                $tahunSekarang = intval($tahunSekarang);
                $duaTahunLalu = $tahunSekarang - 2;

                $dataJatahCuti = JatahCuti::where('NIP', $dataNIP)->whereBetween('tahun', [$duaTahunLalu, $tahunSekarang])->get();

                // looping dataJatahCuti untuk mengurangi dengan jumlah cuti :
                foreach ($dataJatahCuti as $dataJatah) {
                    // kurangi jatah cuti
                    if ($jumlahCuti != 0) {
                        if (($dataJatah->jatah - $jumlahCuti) < 1) {
                            JatahCuti::where('NIP', $dataNIP)
                                ->where('tahun', $dataJatah->tahun)
                                ->update(['jatah' => 0]);
                            $jumlahCuti = $jumlahCuti - $dataJatah->jatah;
                        }
                        // jika tidak habis maka :
                        else {
                            $sisaa = $dataJatah->jatah - $jumlahCuti;
                            JatahCuti::where('NIP', $dataNIP)
                                ->where('tahun', $dataJatah->tahun)
                                ->update(['jatah' => $sisaa]);
                            break;
                        }
                    }
                }
            }

            PengajuanCuti::where('id', $data->persetujuanPertama->pengajuanCuti->id)
                ->update(['status' => 'disetujui']);

            // buat surat : 
            Surat::create(['persetujuan_kedua_id' => $data->id]);
        } else {
            PengajuanCuti::where('id', $data->persetujuanPertama->pengajuanCuti->id)
                ->update(['status' => 'tolak']);
        }

        PersetujuanKedua::where('id', $data->id)
            ->update($validated);

        return back()->with('success', 'Data perstujuan berhasil di ubah!');
    }
}
