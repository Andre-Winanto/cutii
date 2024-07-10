@extends('layouts.main')

@section('container')

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
                                <h4 class="main-title">Selamat Datang di Sistem Informasi Pengajuan Cuti Sebagai Atasan</h4>
                                <h6 class="card-title-bold">Informasi Terkini</h6>
                                <p class="card-text">Gunakan Hak dan Wewenang semaksimal Mungkin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
        font-size: 1.25rem;
    }

    .main-title {
        font-weight: bold;
        font-size: 1.5rem;
        margin-top: 30px;
    }

    .card-text {
        text-align: justify;
    }
</style>

@endsection