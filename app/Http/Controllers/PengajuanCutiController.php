<?php

namespace App\Http\Controllers;

use App\Models\JatahCuti;
use App\Models\PengajuanCuti;
use App\Models\PersetujuanPertama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class PengajuanCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // return PengajuanCuti::where('NIP', Auth::guard('pegawai')->user()->NIP)->get();
        return view('dashboardPengajuanCuti.index', [
            'jatahCutis' => JatahCuti::where('NIP', Auth::guard('pegawai')->user()->NIP)->get(),
            'pengajuanCutis' => PengajuanCuti::where('NIP', Auth::guard('pegawai')->user()->NIP)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $jenisCuti = [
            'cuti tahunan',
            'cuti sakit',
            'cuti karena alasan penting',
            'cuti besar',
            'cuti melahirkan',
            'cuti diluar tanggungan negara',
        ];

        return view('dashboardPengajuanCuti.create', [
            'jenisCutis' => $jenisCuti
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'NIP' => 'required',
            'nama_kelompok' => 'required',
            'jenis_cuti' => 'required',
            'alasan' => 'required',
            'tanggal_mulai_cuti' => 'required',
            'tanggal_akhir_cuti' => 'required',
            'alamat_cuti' => 'required'
        ]);

        // mengecek selisih hari
        $tanggalMulai = date_create($request->tanggal_mulai_cuti);
        $tanggalAkhir = date_create($request->tanggal_akhir_cuti);

        $jumlahCuti = date_diff($tanggalMulai, $tanggalAkhir);
        $jumlahCuti = $jumlahCuti->days + 1;

        // ambil data jatah cuti berdasarkan 3 tahun yang lalu :
        $tahunSekarang = date('Y');
        $tahunSekarang = intval($tahunSekarang);
        $duaTahunLalu = $tahunSekarang - 2;

        $dataJatahCuti = JatahCuti::where('NIP', Auth::guard('pegawai')->user()->NIP)->whereBetween('tahun', [$duaTahunLalu, $tahunSekarang])->get();

        $sisaLiburan = 0;
        foreach ($dataJatahCuti as $sisa) {
            $sisaLiburan += $sisa->jatah;
        }

        // bandingkan hari dan buat eror
        if ($jumlahCuti > $sisaLiburan) {
            return back()->with('errorJumlahCuti', 'Jumlah Cuti Melewati Batas');
        }

        // tambah data pengajuan cuti :
        $getDataPengajuanCuti = PengajuanCuti::create($validated);

        // tambah data persetujuan pertama :
        $dataPersetujuanPertama = [
            'pengajuan_cuti_id' => $getDataPengajuanCuti->id,
            'kelompok' => Auth::guard('pegawai')->user()->nama_kelompok
        ];

        PersetujuanPertama::create($dataPersetujuanPertama);

        return redirect('dashboard/pengajuancuti')->with('success', 'Pengajuan cuti berhasil diajukan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanCuti $pengajuanCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanCuti $pengajuanCuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengajuanCuti $pengajuanCuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengajuanCuti $pengajuanCuti)
    {
        //
    }

    public function cetakcuti(PengajuanCuti $data)
    {
        // ambil data jatah cuti berdasarkan 3 tahun yang lalu :
        $tahunSekarang = date('Y');
        $tahunSekarang = intval($tahunSekarang);
        $duaTahunLalu = $tahunSekarang - 2;

        return view('dashboardPengajuanCuti.cetak', [
            'pengajuanCuti' => $data,
            'jatahCutiDuaTahunLalu' => JatahCuti::where('NIP', Auth::guard('pegawai')->user()->NIP)->where('tahun', ($duaTahunLalu))->first(),
            'jatahCutiSatuTahunLalu' => JatahCuti::where('NIP', Auth::guard('pegawai')->user()->NIP)->where('tahun', ($duaTahunLalu + 1))->first(),
            'jatahCutiTahunSekarang' => JatahCuti::where('NIP', Auth::guard('pegawai')->user()->NIP)->where('tahun', $tahunSekarang)->first()
        ]);
    }

    public function cetaksurat(PengajuanCuti $data)
    {
        return view(
            'dashboardPengajuanCuti.cetaksurat',
            [
                'pengajuanCuti' => $data,
                'dataDiri' => Auth::guard('pegawai')->user(),
            ]
        );
    }
}
