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

                        <div class="card-body mb-3 mt-1 p-2">
                            <h5 class="card-title mb-0" style="font-size: 24px; color: #000000; font-weight: bold;">Data Surat</h5>
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

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-success">
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama</th>
                                        <th scope="col" class="text-center">Nomor Surat</th>
                                        <th scope="col" class="text-center">Tanggal Disahkan</th>
                                        <th scope="col" class="text-center">Nama Penanda Tangan</th>
                                        <th scope="col" class="text-center">NIP</th>
                                        <th scope="col" class="text-center">Penanda Tangan</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surats as $surat)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $surat->persetujuanKedua->persetujuanPertama->pengajuanCuti->pegawai->nama }}</td>
                                            <td>{{ $surat->no_surat }}</td>
                                            <td>{{ $surat->tanggal_disahkan }}</td>
                                            <td>{{ $surat->nama }}</td>
                                            <td>{{ $surat->nip }}</td>
                                            <td>{{ $surat->penanda_tangan }}</td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ url('dashboard/surat/' . $surat->id . '/show') }}"
                                                        class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
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
@endsection