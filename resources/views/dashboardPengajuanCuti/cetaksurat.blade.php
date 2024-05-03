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
                <img src="logo.png" alt="Logo Perusahaan">
            </div>
            <div class="company-info">
                <h1>KEMENTRIAN PERTANIAN</h1>
                <h1>BADAN STANDARDISASI INSTUMEN PERTANIAN</h1>
                <h2>BALA PENERAPAN STANDAR INSTRUMEN PERTANIAN JAMBI</h2>
                <p>JL SAMARINDA NO 11 PAAL LIMA KOTA BARU KOTAK POS 118 - JAMBI 36128n</p>
                <p>JL RAYA JAMBI - TEMPINO KM.16 DESA PONDOK MEJA - JAMBI</p>
                <p>TELEPON :(0741) 40174, FAKSMILI : (0741) 40413</p>
                <p>WEBSITE:jambi.bsip.pertanian.go.id E-MAIL:bpsip.jambi@pertanian.go.id</p>
            </div>
        </div>

        <hr color="#1065c0" size="5" width="90%" align="center" noshade> <!-- Garis horizontal di sini -->
        <hr color="#2277aa" size="2" width="90%" align="center" noshade> <!-- Garis horizontal di sini -->

        <div class="pertama">
            <h1>SURAT IZIN CUTI TAHUNAN</h1>
            <p>Nomor : {{ $pengajuanCuti->persetujuanPertama->persetujuanKedua->surat->no_surat }}</p>
        </div>

        <div class="content">
            <h1> Di berikan izn cuti tahunan kepada Pegawai Negeri Sipil:</h1>

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
                        <td>Balai Penerapan Standar Instrmen Pertanian jambi</td>
                    </tr>
                </table>
            </div>

            <h1>
                <tr>Terhitung Mulai Tanggal</tr>
                <tr>
                    {{ date('d-m-Y', strtotime($pengajuanCuti->tanggal_mulai_cuti)) }}
                </tr>
                <tr>s.d </tr>
                <tr>
                    {{ date('d-m-Y', strtotime($pengajuanCuti->tanggal_akhir_cuti)) }}
                </tr>
                <tr> ( </tr>
                <tr>{{ $jumlahCuti }}</tr>
                <tr>hari kerja
                <tr>),</tr> dengan ketentuan sebagai berikut: </tr>
            </h1>


            <h2> a. Sebelum menjalankan cuti tahunan, wajib menyerahkan pekerjaan kepada atasan
                langsungnya atau pejabat yang ditunjuk.</h2>

            <h2> b. Setelah menjalankan cuti tahunan, wajib melaporkan diri kepada
                atasan langsungnya dan bekerja kembali sebagaimana biasa.</h2>

            <h1> Demikian surat izin cuti tahunan ini dibuat untuk dapat digunakan sebagaimana mestinya.</h1>


            <p>
                Jambi,
                {{ date('d-m-Y', strtotime($pengajuanCuti->persetujuanPertama->persetujuanKedua->surat->tanggal_disahkan)) }}
                <br>
                <br>
                Ditandatangani secara elektronik oleh
                <br>
                ${jabatan_pengirim},
                <br>
                Jambi,
                {{ date('d-m-Y', strtotime($pengajuanCuti->persetujuanPertama->persetujuanKedua->surat->tanggal_disahkan)) }}
            </p>

            <div class="ttd">
                <table width="100%" border="0">
                    <tr>
                        <td width="64%"></td>
                        <td width="36%"> <img src="ttd balai.png"></td>

                    </tr>
                </table>
            </div>

            <p>
                ${ttd_pengirim}
                <br>
                ${nama_pengirim}
                <br>
                NIP.${nip_pengirim}
            </p>



        </div>
    </div>
</body>

</html>
