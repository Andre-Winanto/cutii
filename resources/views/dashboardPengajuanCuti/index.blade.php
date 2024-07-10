@extends('layouts.main')

@section('container')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        @if (session()->has('success'))
                            <div class="card-body p-2">
                                <div class="alert alert-success alert-dismissible m-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif

                        <div class="card-body">
                            <h4>Sisa Cuti</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-success">
                                        <tr>
                                            <th scope="col">Tahun</th>
                                            <th scope="col">Sisa Cuti</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jatahCutis as $jatahCuti)
                                            <tr>
                                                <td>{{ $jatahCuti->tahun }}</td>
                                                <td>{{ $jatahCuti->jatah }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-4 align-items-center">
                                <h4 class="mb-0">Riwayat Pengajuan</h4>
                                <a class="btn btn-primary ml-auto" href="{{ url('dashboard/pengajuancuti/create') }}"> Ajukan Cuti </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-success">
                                    <tr>
                                        <th scope="col">Jenis Cuti</th>
                                        <th scope="col">Alasan</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <th scope="col">Tanggal Akhir</th>
                                        <th scope="col">Alamat Cuti</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Cetak Form</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuanCutis as $pengajuanCuti)
                                        <tr>
                                            <td>{{ $pengajuanCuti->jenis_cuti }}</td>
                                            <td>{{ $pengajuanCuti->alasan }}</td>
                                            <td>{{ $pengajuanCuti->tanggal_mulai_cuti }}</td>
                                            <td>{{ $pengajuanCuti->tanggal_akhir_cuti }}</td>
                                            <td>{{ $pengajuanCuti->alamat_cuti }}</td>
                                            <td>
                                                @if($pengajuanCuti->status == 'disetujui')
                                                    <span class="badge bg-success">{{ $pengajuanCuti->status }}</span>
                                                @elseif($pengajuanCuti->status == 'tolak')
                                                    <span class="badge bg-danger">{{ $pengajuanCuti->status }}</span>
                                                @else
                                                    <span class="badge bg-warning">Masih di Proses</span>
                                                @endif
                                            </td>
                                            
                                           
                
                                            <td>
                                                @if ($pengajuanCuti->status == 'disetujui')
                                                    <a href="{{ url('dashboard/cetakcuti/' . $pengajuanCuti->id) }}" class="btn btn-success btn-sm">
                                                        <i class="fas fa-file"></i>
                                                    </a>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ url('dashboard/pengajuancuti/' . $pengajuanCuti->id ) }}" class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table thead th, .table tbody td, .table tbody th {
            text-align: center;
            vertical-align: middle;
        }
        .table thead th {
            border-bottom: 2px solid #dee2e6;
        }
    </style>
@endsection