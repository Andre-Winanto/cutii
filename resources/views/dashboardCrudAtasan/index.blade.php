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
                            <a class="btn btn-primary" href="{{ url('dashboard/dataatasan/create') }}">Tambah Data Atasan</a>
                        </div>

                        <div class="card-body p-2">
                            <h5 class="card-title mb-0">Data Atasan</h5>
                        </div>

                        <style>
                            .table th, .table td {
                                text-align: center;
                                vertical-align: middle;
                            }
                            .table thead th {
                                border-bottom: 2px solid #dee2e6;
                            }
                        </style>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Masa Kerja (thn)</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atasans as $atasan)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $atasan->NIP }}</td>
                                            <td>{{ $atasan->nama }}</td>
                                            <td>{{ $atasan->jabatan }}</td>
                                            <td>{{ $atasan->masa_kerja }}</td>
                                            <td>{{ $atasan->email }}</td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ url('dashboard/dataatasan/' . $atasan->id . '/edit') }}" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                                    <form action="{{ url('dashboard/dataatasan/' . $atasan->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Data atasan akan dihapus')"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- End of table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection