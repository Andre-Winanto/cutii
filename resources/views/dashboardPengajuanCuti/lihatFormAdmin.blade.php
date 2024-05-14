<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/form2.css') }}">
    {{-- Bootstrap Icon Link --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <div class="container">
        <div class="lampiran">
            <div class="text-lampiran"></div>
            <div class="text-lampiran2">
                <p>ANAK LAMPIRAN 1.b</p>
                <p>PERATURAN BADAN KEPEGAWAIAN NEGARA REPUBLIK INDONESIA</p>
                <p>NOMOR 24 TAHUN 2017</p>
                <p>TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL</p>
                <p>Jambi, {{ date('d-m-Y', strtotime($pengajuanCuti->created_at)) }}</p>
                <p>Kepada Yth. Kepala BPSIP Jambi</p>
                <p> di.</p>
                <p>Jambi</p>
            </div>
        </div>

        <!--  -->
        <!-- <center><h3>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h3></center> -->

        <div class="con-formulir">
            <div class="formulir">
                FORMULIR PERMINTAAN DAN PEMBERIAN CUTI
            </div>
        </div>

        <!-- table data pegawai -->
        <div class="container-table-pegawai">
            <table width="100%" border="1px">
                <tr>
                    <td colspan="4">DATA PEGAWAI</td>
                </tr>

                <tr>
                    <td width="10%">Nama</td>
                    <td width="60%">{{ $pegawai->nama }}</td>
                    <td width="10%">NIP</td>
                    <td width="20%">{{ $pegawai->NIP }}</td>
                </tr>

                <tr>
                    <td width="10%">Jabatan</td>
                    <td width="60%">{{ $pegawai->jabatan }}</td>
                    <td width="10%">Masa Kerja</td>
                    <td width="20%">{{ $pegawai->masa_kerja }} Tahun</td>
                </tr>

                <tr>
                    <td width="10%">Unit Kerja</td>
                    <td width="90%" colspan="3"> Balai Standarisasi Instrumen Pertanian Jambi</td>
                </tr>

            </table>
        </div>


        <br>


        <!-- table junis cuti : -->
        <div class="container-table-pegawai">
            <table width="100%" border="1px">
                <tr>
                    <td colspan="4">II. JENIS CUTI YANG DI AMBIL</td>
                </tr>

                <tr>
                    <td width="40%">1. Cuti tahunan</td>
                    <td width="10%">
                        @if ($pengajuanCuti->jenis_cuti == 'cuti tahunan')
                            <i class="bi bi-check-all"></i>
                        @endif
                    </td>
                    <td width="40%">2. Cuti Besar</td>
                    <td width="10%">
                        @if ($pengajuanCuti->jenis_cuti == 'cuti besar')
                            <i class="bi bi-check-all"></i>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td width="40%">3. Cuti Sakit</td>
                    <td width="10%">
                        @if ($pengajuanCuti->jenis_cuti == 'cuti sakit')
                            <i class="bi bi-check-all"></i>
                        @endif
                    </td>
                    <td width="40%">4. Cuti Melahirkan</td>
                    <td width="10%">
                        @if ($pengajuanCuti->jenis_cuti == 'cuti melahirkan')
                            <i class="bi bi-check-all"></i>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td width="40%">5. Cuti Karena Alasan Penting</td>
                    <td width="10%">
                        @if ($pengajuanCuti->jenis_cuti == 'cuti karena alasan penting')
                            <i class="bi bi-check-all"></i>
                        @endif
                    </td>
                    <td width="40%">6. Cuti Di Luar Tanggungan Negara </td>
                    <td width="10%">
                        @if ($pengajuanCuti->jenis_cuti == 'cuti diluar tanggungan negara')
                            <i class="bi bi-check-all"></i>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <br>

        <!-- Tabel Alasan Cuti -->
        <div class="container-table-pegawai">
            <table width="100%" border="1px">
                <tr>
                    <td colspan="4">III. Alasan Cuti</td>
                </tr>

                <tr>
                    <td cosplan="4" width="40%">{{ $pengajuanCuti->alasan }}</td>
                </tr>
        </div>

        <!-- Tabel Lamanya Cuti -->
        <div class="container-table-pegawai">
            <table width="100%" border="1px">
                <tr>
                    <td colspan="4">III. Alasan Cuti</td>
                </tr>

                <tr>
                    <td width="10%">Selama</td>
                    <td width="26%">{{ $jumlahCuti }} Hari</td>
                    <td width="14%">Pada Tanggal</td>
                    <td width="46%">{{ $pengajuanCuti->tanggal_mulai_cuti }}</td>
                </tr>

            </table>
        </div>

        <!-- Tabel Catatan Cuti-->
        <div class="container-table-pegawai">
            <table width="100%" border="1px">
                <tr>
                    <td colspan="5">V. CATATAN CUTI</td>
                </tr>

                <tr>
                    <td colspan="3"> 1. CUTI TAHUNAN</td>
                    <td width="49%"> 3. CUTI BESAR</td>
                    <td width="15%">kosong</td>
                </tr>

                <tr>
                    <td width="12%">Tahun</td>
                    <td width="12%">Sisa</td>
                    <td width="12%">Keterangan</td>
                    <td width="49%"> 3. CUTI SAKIT</td>
                    <td width="15%">kosong</td>
                </tr>

                <tr>
                    <td width="12%">N-2</td>
                    <td width="12%">
                        @if ($jatahCutiDuaTahunLalu)
                            {{ $jatahCutiDuaTahunLalu->jatah }}
                        @endif
                    </td>
                    <td width="12%">Kosong</td>
                    <td width="49%"> 4. CUTI MELAHIRKAN</td>
                    <td width="15%">kosong</td>
                </tr>
                <tr>
                    <td width="12%">N-1</td>
                    <td width="12%">
                        @if ($jatahCutiSatuTahunLalu)
                            {{ $jatahCutiSatuTahunLalu->jatah }}
                        @endif
                    </td>
                    <td width="12%">Kosong</td>
                    <td width="49%"> 5. CUTI KARENA ALASAN PENTING</td>
                    <td width="15%">kosong</td>
                </tr>
                <tr>
                    <td width="12%">N</td>
                    <td width="12%">{{ $jatahCutiTahunSekarang->jatah }}</td>
                    <td width="12%">Kosong</td>
                    <td width="49%"> 6. CUTI DI LUAR TANGGUNGAN NEGARA </td>
                    <td width="15%">kosong</td>
                </tr>
            </table>
        </div>

        <br>

        <!-- Tabel Alamat Selama Menjalankan Cuti-->
        <div class="container-table-pegawai">
            <table width="100%" border="1px">
                <tr>
                    <td colspan="5">VI. ALAMAT SELAMA MENJALANKAN CUTI</td>
                </tr>

                <tr>
                    <td width="38%"> Alamat Lengkap</td>
                    <td width="24%"> Telepon</td>
                    <td width="38%" border="">Hormat Saya</td>

                </tr>

                <tr>
                    <td width="38%" rowspan="3">{{ $pengajuanCuti->alamat_cuti }}</td>
                    <td width="24%" rowspan="3">{{ $pegawai->no_hp }}</td>
                    <td rowspan="1" height="100px"><img src="{{ asset('file/ttd_kasubag.jpg') }} "
                            style="width: 100%; height: 100%;" alt="">
                    </td>
                    </td>
                    <!-- <td width="24%" rowspan="2"> kosong</td> -->
                    <!-- <td width="24%" rowspan=""> kosong</td> -->
                </tr>

                <tr>
                    <td>({{ $pegawai->NIP }})</td>
                </tr>


                <tr>
                    <td>NIP</td>
                </tr>

            </table>
        </div>

        <br>

        <!-- Pertimbangan atasan langsung-->

        <div class="container-table-pegawai">
            <table width="100%" border="1px">
                <tr>
                    <td colspan="5">VII. PERTIMBANGAN ATASAN LANGSUNG</td>
                </tr>

                <tr>
                    <td width="20.5%"> DISETUJUI</td>
                    <td width="20.5%"> PERUBAHAN ****</td>
                    <td width="20.5%">DITANGGUHKAN****</td>
                    <td width="38.5%">TIDAK DI SETUJUI****</td>

                </tr>


                <tr>
                    <td width="20.5%" rowspan="4">
                        @if ($dataPersetujuanPertama->status == 'setuju')
                            <p style="font-size: 50px"><i class="bi bi-check-all"></i></p>
                        @endif
                    </td>
                    <td width="20.5%" rowspan="4"></td>
                    <td width="20.5%" rowspan="4"></td>
                    <td width="38.5">Atasan Langsung </td>
                </tr>

                <tr>
                    <td rowspan="1" height="100px"><img style="width: 100%; height: 100%"
                            src="{{ asset('file/' . $dataKetuaKelompok->ttd) }}" alt=""></td>
                </tr>

                <tr>
                    <td>({{ $dataKetuaKelompok->NIP }})</td>
                </tr>


                <tr>
                    <td>NIP</td>
                </tr>

            </table>
        </div>

        <br>
        <!-- Keputusan pejabat yang berhak yang berwenang memberikan cuti-->

        <div class="container-table-pegawai">
            <table width="100%" border="1px">
                <tr>
                    <td colspan="5">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **</td>
                </tr>

                <tr>
                    <td width="20.5%"> DISETUJUI</td>
                    <td width="20.5%"> PERUBAHAN ****</td>
                    <td width="20.5%">DITANGGUHKAN****</td>
                    <td width="38.5%">TIDAK DI SETUJUI****</td>

                </tr>

                <tr>
                    <td width="20.5%" rowspan="4">
                        @if ($dataPersetujuanKedua->status == 'setuju')
                            <p style="font-size: 50px"><i class="bi bi-check-all"></i></p>
                        @endif
                    </td>
                    <td width="20.5%" rowspan="4"></td>
                    <td width="20.5%" rowspan="4"></td>
                    <td width="38.5">Atasan Langsung </td>
                </tr>

                <tr>
                    <td rowspan="1" height="100px"><img style="width: 100%; height: 100%"
                            src="{{ asset('file/' . $dataKetuaBalai->ttd) }}" alt=""></td>
                </tr>

                <tr>
                    <td>({{ $dataKetuaBalai->NIP }})</td>
                </tr>


                <tr>
                    <td>NIP</td>
                </tr>

                <br>

            </table>
        </div>

        <div class="container">
            <div class="lampiran">
                <div class="lampiran-footer">
                    <div class="text-lampiran-footer">
                        <p>Catatan</p>
                        <p>* Coret yang tidak perlu</p>
                        <p>** Pilih salh satu dengan memberi tanda centang (?) </p>
                        <p>*** Diisi oleh pejabat yang menangani bidang kepegawain sebelum PNS mengajukan cuti</p>
                        <p>**** Di beri tanda centang dan alasannya </p>
                        <p>N = Cuti Tahun Berjalan </p>
                        <p>N-1 = Sisa cuti 1 tahun sebelumnya</p>
                        <p>N-2 = Sisa cuti 2 tahin sebelumnya </p>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
