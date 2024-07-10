<?php

namespace App\Http\Controllers;

    use App\Models\Pegawai;
    use App\Models\Atasan;
    use App\Models\Surat;
    use App\Models\PengajuanCuti;
    use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPegawai = Pegawai::count();
        $jumlahAtasan = Atasan::count();
        $jumlahSurat = Surat::count();
        $JumlahPengajuan = PengajuanCuti::count();

        // Debug output
        dd($jumlahPegawai, $jumlahAtasan, $jumlahSurat, $JumlahPengajuan);

        return view('welcome', compact('jumlahPegawai', 'jumlahAtasan', 'jumlahSurat','jumlahPengajuan'));
    }
}