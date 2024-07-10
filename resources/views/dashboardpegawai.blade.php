{{-- @extends('layouts.main')

@section('container')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pegawai PNS</title>
    
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar a:hover {
            background-color: #575d63;
        }

        .content {
            padding: 20px;
        }

        .dashboard-card {
            margin: 20px 0;
        }

        .card-icon {
            font-size: 2.5rem;
        }

        .text-card {
            margin: 10px 0;
        }
        
        .card-title-bold {
            font-weight: bold;
            font-size: 1.25rem; /* Ukuran teks untuk judul dalam kartu tambahan */
        }

        .main-title {
            font-weight: bold;
            font-size: 1.5rem; /* Ukuran teks untuk judul besar */
            margin-top: 30px; /* Margin atas untuk judul besar */
        }

        .card-text {
            text-align: justify; /* Menambahkan justifikasi teks */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar content here -->
            </div>
            <div class="col-md-9">
                <div class="content">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="main-title">Selamat Datang di Sistem Informasi Pengajuan Cuti Sebagai Pegawai</h4>
                                    <h6 class="card-title-bold">Informasi Terkini</h6>
                                    <p class="card-text">Informasi terbaru mengenai kegiatan dan berita penting lainnya akan ditampilkan di sini.</p>
                                    <p class="card-text">Yang bersangkutan mengajukan surat permohonan izin cuti disesuaikan dengan jenis cuti yang akan diambil melalui pimpinan unit. Pimpinan unit</p>
                                    <p class="card-text">menyetujui permohonan dari yang bersangkutan dengan membubuhkan tandatangan dan memberikan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Main title for additional text cards -->
                    <div class="row mt-4">
                        <div class="col-md-10">
                            <h4 class="main-title">Persyaratan Permohonan Cuti Pegawai Negeri Sipil</h4>
                        </div>
                    </div>

                    <!-- Additional text cards with titles -->
                    <div class="row">
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti Tahunan</h6>
                                    <p class="card-text">Aturan cuti ini diberikan untuk PNS yang setidaknya sudah bekerja sekurang-kurangnya 1 tahun secara terus menerus. Dengan lamanya masa cuti 12 hari kerja.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti Besar</h6>
                                    <p class="card-text">Jenis cuti ini diberikan kepada mereka yang telah mengabdikan dirinya sekurang-kurangnya 6 tahun secara terus menerus. Durasi cuti besar yang boleh diambil adalah 3 bulan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti Sakit</h6>
                                    <p class="card-text">Bila PNS jatuh sakit dan tidak memungkinkan untuk melakukan pekerjaan, yang bersangkutan berhak atas cuti sakit. Aturan cuti PNS yang sakit diberikan 1 hari kerja atau 2 hari kerja dengan ketentuan bahwa ia harus memberikan kepada atasannya dan melampirkan surat keterangan sakit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti Melahirkan</h6>
                                    <p class="card-text">Untuk persalinan anak yang pertama, kedua, dan ketiga, PNS wanita berhak atas cuti melahirkan. Namun untuk persalinan anak keempat dan seterusnya, diberikan cuti di luar tanggungan negara. Ketentuan lamanya cuti melahirkan adalah 1 bulan sebelum dan 2 bulan sesudah persalinan. Cuti ini diajukan secara tertulis dan selama menjalankan cuti ini, PNS wanita masih berhak mendapatkan penghasilannya.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti Karena Alasan Penting</h6>
                                    <p class="card-text">Permohonan cuti karena alasan penting harus disertai dengan surat penjelasan yang detail mengenai keperluan cuti, dan pengajuan harus dilakukan minimal dua minggu sebelum tanggal yang diinginkan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti di Luar Tanggungan Negara</h6>
                                    <p class="card-text">Permohonan cuti di luar tanggungan negara karena alasan keluarga harus disertai dengan surat penjelasan dan bukti yang relevan, serta harus mendapatkan persetujuan dari atasan langsung.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        <footer class="footer text-center">
            Development by <a href="">Andre</a>.
        </footer>
    </div>
</body>
</html>
@endsection --}}


@extends('layouts.main')

@section('container')
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>

<style>
    body {
        background-color: #f8f9fa;
    }

    .sidebar a:hover {
        background-color: #575d63;
    }

    .content {
        padding: 20px;
    }

    .dashboard-card {
        margin: 20px 0;
    }

    .card-icon {
        font-size: 2.5rem;
    }

    .text-card {
        margin: 10px 0;
    }
    
    .card-title-bold {
        font-weight: bold;
        font-size: 1.25rem; /* Ukuran teks untuk judul dalam kartu tambahan */
    }

    .main-title {
        font-weight: bold;
        font-size: 1.5rem; /* Ukuran teks untuk judul besar */
        margin-top: 30px; /* Margin atas untuk judul besar */
    }

    .card-text {
        text-align: justify; /* Menambahkan justifikasi teks */
    }
</style>
<body>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>

            <div class="content">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="main-title">Selamat Datang di Sistem Informasi Pengajuan Cuti Sebagai Pegawai</h4>
                                    <h6 class="card-title-bold">Informasi Terkini</h6>
                                    <p class="card-text">Informasi terbaru mengenai kegiatan dan berita penting lainnya akan ditampilkan di sini.</p>
                                    <p class="card-text">Yang bersangkutan mengajukan surat permohonan izin cuti disesuaikan dengan jenis cuti yang akan diambil melalui pimpinan unit. Pimpinan unit</p>
                                    <p class="card-text">menyetujui permohonan dari yang bersangkutan dengan membubuhkan tandatangan dan memberikan.</p>
                                </div>
                            </div>
                        </div>

                         <!-- Main title for additional text cards -->
                    <div class="row mt-4">
                        <div class="col-md-10">
                            <h4 class="main-title">Persyaratan Permohonan Cuti Pegawai Negeri Sipil</h4>
                        </div>
                    </div>

                    <!-- Additional text cards with titles -->
                    <div class="row">
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti Tahunan</h6>
                                    <p class="card-text">Aturan cuti ini diberikan untuk PNS yang setidaknya sudah bekerja sekurang-kurangnya 1 tahun secara terus menerus. Dengan lamanya masa cuti 12 hari kerja.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti Besar</h6>
                                    <p class="card-text">Jenis cuti ini diberikan kepada mereka yang telah mengabdikan dirinya sekurang-kurangnya 6 tahun secara terus menerus. Durasi cuti besar yang boleh diambil adalah 3 bulan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti Sakit</h6>
                                    <p class="card-text">Bila PNS jatuh sakit dan tidak memungkinkan untuk melakukan pekerjaan, yang bersangkutan berhak atas cuti sakit. Aturan cuti PNS yang sakit diberikan 1 hari kerja atau 2 hari kerja dengan ketentuan bahwa ia harus memberikan kepada atasannya dan melampirkan surat keterangan sakit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti Melahirkan</h6>
                                    <p class="card-text">Untuk persalinan anak yang pertama, kedua, dan ketiga, PNS wanita berhak atas cuti melahirkan. Namun untuk persalinan anak keempat dan seterusnya, diberikan cuti di luar tanggungan negara. Ketentuan lamanya cuti melahirkan adalah 1 bulan sebelum dan 2 bulan sesudah persalinan. Cuti ini diajukan secara tertulis dan selama menjalankan cuti ini, PNS wanita masih berhak mendapatkan penghasilannya.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti Karena Alasan Penting</h6>
                                    <p class="card-text">Permohonan cuti karena alasan penting harus disertai dengan surat penjelasan yang detail mengenai keperluan cuti, dan pengajuan harus dilakukan minimal dua minggu sebelum tanggal yang diinginkan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title-bold">Cuti di Luar Tanggungan Negara</h6>
                                    <p class="card-text">Permohonan cuti di luar tanggungan negara karena alasan keluarga harus disertai dengan surat penjelasan dan bukti yang relevan, serta harus mendapatkan persetujuan dari atasan langsung.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <footer class="footer text-center">
            Development by <a href="">Andre</a>.
        </footer>
    </div>
</body>
</html>
@endsection
