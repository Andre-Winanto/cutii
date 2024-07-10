<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    {{-- Bootstrap Icon Link --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Link CSS Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
        <!-- Isi halaman -->
        <!-- Script JavaScript Font Awesome (jika diperlukan) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>


</head>

                <body>
                    <div class="a4-page">
                        <!-- Isi Halaman -->
                   
                    <div class="container">
                        <div class="lampiran">
                            <div class="text-lampiran"></div>
                            <div class="text-lampiran2">
                                <p>ANAK LAMPIRAN 1.b</p>
                                <p>PERATURAN BADAN KEPEGAWAIAN NEGARA REPUBLIK INDONESIA</p>
                                <p>NOMOR 24 TAHUN 2017</p>
                                <p>TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL</p>
                                <p>Jambi,{{ Carbon\Carbon::parse($pengajuanCuti->created_at)->translatedFormat('d F Y') }}</p>
                                <p>Kepada Yth. Kepala BPSIP Jambi</p>
                                <p class="jarakdi"> di.</p>
                                <p class="jarak">Jambi</p>
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
        

        <table >
            <tr>
                <td colspan="4" class="bold-text">I.  DATA PEGAWAI</td>
            </tr>
            <tr>
                <td width="10%">Nama</td>
                <td width="60%">{{ Auth::guard('pegawai')->user()->nama }}</td>
                <td width="10%">NIP</td>
                <td width="20%">{{ Auth::guard('pegawai')->user()->NIP }}</td>
               
            </tr>
           
            <tr>
                <td width="10%">Jabatan</td>
                <td width="60%">{{ Auth::guard('pegawai')->user()->jabatan }}</td>
                <td width="10%">Masa Kerja</td>
                <td width="20%">{{ Auth::guard('pegawai')->user()->masa_kerja }} Tahun</td>
               
            </tr>
            <tr></tr>
            <tr>
                <td >Unit Kerja</td>
                <td colspan="3">Balai Penerapan Standar Instrumen Pertanian Jambi</td>
                
            </tr>
            <tr></tr>
           
            <tr></tr>
        </table>

        <br>
        {{-- Tabel Jenis Cuti --}}
        <table>
            <tr>
                <td colspan="4" class="bold-text">II. JENIS CUTI YANG DI AMBIL **</td>
            </tr>

            <tr>
                <td width="40%" >1. Cuti tahunan</td>
                <td width="10%" style="text-align: center"> @if ($pengajuanCuti->jenis_cuti == 'cuti tahunan')
                    <i class="bi bi-check"></i>
                @endif</td>
                <td width="40%">2. Cuti Besar</td>
                <td width="10%" style="text-align: center"> @if ($pengajuanCuti->jenis_cuti == 'cuti besar')
                    <i class="bi bi-check"></i>
                @endif</td>
            </tr>

            <tr>
                <td width="40%">3. Cuti Sakit</td>
                <td width="10%" style="text-align: center">  @if ($pengajuanCuti->jenis_cuti == 'cuti sakit')
                    <i class="bi bi-check"></i>
                @endif</td>
                <td width="40%">4. Cuti Melahirkan</td>
                <td width="10%" style="text-align: center">@if ($pengajuanCuti->jenis_cuti == 'cuti melahirkan')
                    <i class="bi bi-check"></i>
                @endif</td>
            </tr>

            <tr>
                <td width="40%">5. Cuti Karena Alasan Penting</td>
                <td width="10%" style="text-align: center">@if ($pengajuanCuti->jenis_cuti == 'cuti alasan penting')
                    <i class="bi bi-check"></i>
                @endif</td>
                <td width="40%">6. Cuti Di Luar Tanggungan Negara </td>
                <td width="10%" style="text-align: center">  @if ($pengajuanCuti->jenis_cuti == 'cuti diluar tanggungan negara')
                    <i class="bi bi-check"></i>
                @endif</td>
            </tr>
        </table>
        <br>
      
        <!-- Tabel Alasan Cuti -->
    
        <table>
            <tr>
                <td colspan="4" class="bold-text">III. ALASAN CUTI</td>
            </tr>
            <tr>
                <td cosplan="4" width="40%">{{ $pengajuanCuti->alasan }}</td>
            </tr>
        </table>  
        <br>
        <!-- Tabel Lamanya Cuti -->

        <table>
            <tr>
                <td colspan="4" class="bold-text">IV. LAMANYA CUTI</td>
            </tr>

            <tr>
                <td width="10%">Selama</td>
                <td width="26%">{{ $jumlahCuti }} Hari</td>
                <td width="14%">Pada Tanggal</td>
                <td width="46%">{{ $pengajuanCuti->tanggal_mulai_cuti }}</td>
            </tr>
        </table>
        <br>
        <!-- Tabel Catatan Cuti-->
        <table >
            <tr>
                <td colspan="5" class="bold-text">V. CATATAN CUTI ***</td>
            </tr>

            <tr>
                <td colspan="3"> 1. CUTI TAHUNAN</td>
                <td width="49%"> 3. CUTI BESAR</td>
                <td width="15%"></td>
            </tr>

            <tr>
                <td width="12%">Tahun</td>
                <td width="12%">Sisa</td>
                <td width="12%">Keterangan</td>
                <td width="49%"> 3. CUTI SAKIT</td>
                <td width="15%"></td>
            </tr>

            <tr>
                <td width="12%">N-2</td>
                <td width="12%"> @if ($jatahCutiDuaTahunLalu)
                    {{ $jatahCutiDuaTahunLalu->jatah }}
                @endif</td>
                <td width="12%"></td>
                <td width="49%"> 4. CUTI MELAHIRKAN</td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td width="12%">N-1 2022</td>
                <td width="12%">@if ($jatahCutiSatuTahunLalu)
                    {{ $jatahCutiSatuTahunLalu->jatah }}
                @endif</td>
                <td width="12%"></td>
                <td width="49%"> 5. CUTI KARENA ALASAN PENTING</td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td width="12%">N 2023</td>
                <td width="12%">{{ $jatahCutiTahunSekarang->jatah }}</td>
                <td width="12%"></td>
                <td width="49%"> 6. CUTI DI LUAR TANGGUNGAN NEGARA </td>
                <td width="15%"></td>
            </tr>
        </table>
        <br>
        <!-- Tabel Alamat Selama Menjalankan Cuti-->
        <table>
            <tr>
                <td colspan="5" class="bold-text">VI. ALAMAT SELAMA MENJALANKAN CUTI **</td>
            </tr>

            <tr>
                <td width="38%" style="text-align: center;"> Alamat Lengkap</td>
                <td width="24%"style="text-align: center;"> Telepon</td>
                <td width="38%" style="text-align: center;">Hormat Saya</td>

            </tr>
          
            <tr>
                <td width="38%" rowspan="3" style="text-align: center;"> {{ $pengajuanCuti->alamat_cuti }}</td>
                <td width="24%" rowspan="3" style="text-align: center;">{{ Auth::guard('pegawai')->user()->no_hp }} </td>         
                <td height="100px" style="text-align: center;"><img src="{{ asset('file/' .Auth::guard('pegawai')->user()->ttd) }}" alt="Deskripsi Gambar" class="ukuran-gambar">
                    <br><br> ({{ Auth::guard('pegawai')->user()->nama }})
                    <br> NIP.({{ Auth::guard('pegawai')->user()->NIP }})
                </td>
               
            </tr>
        </table>

        <!-- Pertimbangan atasan langsung-->
    </table>
    <br>
    <table>
        <tr>
            <td colspan="5" class="bold-text">VII. PERTIMBANGAN ATASAN LANGSUNG **</td>
        </tr>

        <tr>
            <td width="20.5%"style="text-align: center;"> DISETUJUI</td>
            <td width="20.5%" style="text-align: center;"> PERUBAHAN ****</td>
            <td width="20.5%" style="text-align: center;">DITANGGUHKAN****</td>
            <td width="38.5%" style="text-align: center;">TIDAK DI SETUJUI****</td>

        </tr>


        <tr>
            <td width="20.5%" style="text-align: center;">  @if ($dataPersetujuanPertama->status == 'setuju')
                        <p style="font-size: 13px"><i class="bi bi-check"></i></p>
                    @endif</td>
            <td width="20.5%" style="text-align: center;"> </td>         
            <td width="20.5%" style="text-align: center;"> </td>         
            <td width="38.5" style="text-align: center;">Atasan Langsung </td>
        </tr>

        <tr>
            <td width="20.5%" rowspan="4" class="no-border"> </td>
            <td width="20.5%" rowspan="4"class="no-border"> </td>         
            <td width="20.5%" rowspan="4"class="no-border"> </td> 
            <td width="38.5" style="text-align: center;"> <img src="{{ asset('file/' . $dataKetuaKelompok->ttd) }}"  alt="Deskripsi Gambar" class="ukuran-gambar"> 
                <br><br> ({{ $dataKetuaKelompok->nama }})
                <br> NIP.{{ $dataKetuaKelompok->NIP }}
            </td>        
        </tr>

     

    </table>
    <br>
    <table>
        <tr>
            <td colspan="5" class="bold-text">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **</td>
        </tr>
        <div class="tengah">
        <tr>
            <td width="20.5%" style="text-align: center;"> DISETUJUI</td>
            <td width="20.5%" style="text-align: center;"> PERUBAHAN ****</td>
            <td width="20.5%" style="text-align: center;">DITANGGUHKAN****</td>
            <td width="38.5%" style="text-align: center;">TIDAK DI SETUJUI****</td>

        </tr>


        <tr>
            <td width="20.5%" style="text-align: center;">  @if ($dataPersetujuanKedua->status == 'setuju')
                        <p style="font-size: 13px"><i class="bi bi-check"></i></p>
                    @endif </td>
            <td width="20.5%" style="text-align: center;"> </td>         
            <td width="20.5%" style="text-align: center;"> </td>         
            <td width="38.5" style="text-align: center;">Atasan Langsung </td>
        </tr>

        <tr>
            <td width="20.5%" rowspan="4" class="no-border"> </td>
            <td width="20.5%" rowspan="4"class="no-border"> </td>         
            <td width="20.5%" rowspan="4"class="no-border"> </td> 
            <td width="38.5" style="text-align: center;"> <img src="{{ asset('file/' . $dataKetuaBalai->ttd) }}" class="ukuran-gambar">
            <br><br> ({{ $dataKetuaBalai->nama }})
            <br> NIP.{{ $dataKetuaBalai->NIP }}
            </td>        
        </tr>

    </div>


    </table>

    <div class="text-lampiran3">
        <p class="catatan">Catatan :</p>
    </div>
    <table>
        <tr>
            <td width="6%" style="text-align: left;" class="no-border">
                * <br>
                ** <br>
                *** <br>
                **** <br>
                N = <br>
                N-1 = <br>
                N-2 =
            </td>
            <td width="94%" style="text-align: left;" class="no-border">
                Coret yang tidak perlu <br>
                Pilih salah satu dengan memberi tanda ceklis (<i class="bi bi-check">)</i> <br>
                Diisi oleh pejabat yang menangani bidang kepegawain sebelum PNS mengajukan cuti <br>
                Diberi tanda ceklis (<i class="bi bi-check"></i>) dan alasannya <br>
                Cuti tahun berjalan <br>
                Sisa cuti 1 tahun sebelumnya <br>
                Sisa cuti 2 tahun sebelumnya
            </td>
        </tr>
    </table>
      
    
</div>
</div>
</body>
</html>
