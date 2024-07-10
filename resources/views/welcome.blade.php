@extends('layouts.main')

@section('container')
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Font Awesome -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     --}}
</head>
<body>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white">
                                <i class="fas fa-user"></i> {{ $jumlahPegawai }}
                            </h1>
                            <h6 class="text-white">Jumlah Pegawai</h6>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white">
                                <i class="fas fa-user-tie"></i> {{ $jumlahAtasan }}
                            </h1>
                            <h6 class="text-white">Jumlah Atasan</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white">
                                <i class="fas fa-envelope"></i> {{ $jumlahSurat }}
                            </h1>
                            <h6 class="text-white">Jumlah Surat</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white">
                                <i class="fas fa-file-alt"></i> {{ $jumlahPengajuan }}
                            </h1>
                            <h6 class="text-white">Jumlah Pengajuan</h6>
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
