<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE-edge">
    <meta name="viewport" content="width-device-with, inital-scale=1.0">
    <title>Kop Surat</title>
    <link rel="stylesheet" href="{{ asset('css/surat.css') }}">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="{{ asset('assets/images/KOP.png') }}" alt="Logo Perusahaan">
            </div>
        </div>

        {{-- <hr color="#1065c0" size="5" width="90%" align="center" noshade> <!-- Garis horizontal di sini -->
        <hr color="#2277aa" size="2" width="90%" align="center" noshade> <!-- Garis horizontal di sini --> --}}
        
        <br>
        <div class="pertama">
            <h1>SURAT {{  $pengajuanCuti->jenis_cuti }}</h1>
            <p>Nomor : {{ $pengajuanCuti->persetujuanPertama->persetujuanKedua->surat->no_surat }}</p>
        </div>

        <div class="content">
            <h1> Di berikan izin {{  $pengajuanCuti->jenis_cuti }} kepada Pegawai Negeri Sipil:</h1>

            <div class="nama">
                <table width="100%" border="0">
                    <tr>
                        <td width="7%"></td>
                        <td width="27%">Nama</td>
                        <td>:</td>
                        <td width="75%">
                            {{ $dataDiri->nama }}
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>NIP</td>
                        <td>:</td>
                        <td>
                            {{ $dataDiri->NIP }}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Pangat/golongan Ruang</td>
                        <td>:</td>
                        <td>
                            {{ $dataDiri->nama_kelompok }}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>
                            {{ $dataDiri->jabatan }}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Satuan Organisasi</td>
                        <td>:</td>
                        <td>Balai Penerapan Standar Instrumen Pertanian jambi</td>
                    </tr>
                </table>
            </div>

            <h1>
                <tr>Terhitung Mulai Tanggal</tr>
                <tr>
                    {{ \Carbon\Carbon::parse($pengajuanCuti->tanggal_mulai_cuti) ->translatedFormat('d F Y') }}
                </tr>
                <tr>s.d </tr>
                <tr>
                    {{ \Carbon\Carbon::parse($pengajuanCuti->tanggal_akhir_cuti) ->translatedFormat('d F Y') }}
                </tr>
                <tr> ( </tr>
                <tr>{{ $jumlahCuti }}</tr>
                <tr>hari kerja
                <tr>),</tr> dengan ketentuan sebagai berikut: </tr>
            </h1>


            <h2> a. Sebelum menjalankan cuti, wajib menyerahkan pekerjaan kepada atasan
                langsungnya atau pejabat yang ditunjuk.</h2>

            <h2> b. Setelah menjalankan cuti, wajib melaporkan diri kepada
                atasan langsungnya dan bekerja kembali sebagaimana biasa.</h2>

            <h1> Demikian surat izin cuti ini dibuat untuk dapat digunakan sebagaimana mestinya.</h1>


            <p>
                Jambi,
              
                    {{ \Carbon\Carbon::parse($pengajuanCuti->persetujuanPertama->persetujuanKedua->surat->tanggal_disahkan)->translatedFormat('d F Y') }}
                
               <br>
                {{-- @if ($dataAtasan->nama_kelompok == 'Balai')
                    Kepala Balai,
                @else
                    Plh. Kepala Balai,
                @endif --}}
                <span style="display: block; margin-top: -8px;"></span>
                {{ $pengajuanCuti->persetujuanPertama->persetujuanKedua->surat->penanda_tangan }}
              
            <div class="ttd">
                <table width="100%" border="0">
                    <tr>
                        <td width="50"></td>
                        <td width="50%"> <img src="    " alt=""> </td>
                        {{-- {{ asset('file/' . $dataAtasan->ttd) }} --}}

                    </tr>
                </table>
            </div>

            
            <p>
                {{-- <img src="{{ asset('file/' . $dataAtasan->ttd) }}" alt=""> --}}
                <br>
                <strong>{{ $pengajuanCuti->persetujuanPertama->persetujuanKedua->surat->nama }}</strong>
                <span style="display: block; margin-top: -8px;"></span>
                NIP. {{ $pengajuanCuti->persetujuanPertama->persetujuanKedua->surat->nip }} 
                {{--  {{ $dataAtasan->NIP }} --}}
            </p>

        </div>
    </div>
</body>

</html>
