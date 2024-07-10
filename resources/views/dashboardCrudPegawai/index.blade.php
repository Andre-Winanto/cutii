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
                            <div class="card-body py-2">
                                <div class="alert alert-success alert-dismissible m-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif

                        @if (session()->has('errorJatahCuti'))
                            <div class="card-body py-2">
                                <div class="alert alert-warning alert-dismissible m-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('errorJatahCuti') }}
                                </div>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2 mb-2">
                                <a class="btn btn-primary me-10" href="{{ url('dashboard/datapegawai/create') }}">Tambah Data Pegawai</a>
                               
                            </div>
                            <a class="btn btn-success" href="{{ url('dashboard/tambahjatahtahunan') }}">Tambah Jatah Tahunan</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ url('dashboard/laporan') }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                                                    <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" placeholder="Tanggal Awal" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                                    <input type="date" class="form-control" name="tanggal_akhir" placeholder="Tanggal Akhir" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Cetak</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body py-2">
                            <h5 class="card-title mb-0">Data Pegawai</h5>
                        </div>

                        <style>
                            .table thead th, .table tbody td, .table tbody th {
                                text-align: center;
                                vertical-align: middle;
                            }
                            .table thead th {
                                border-bottom: 0.5px solid #c0c5ca;
                            }
                        </style>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">NIP</th>
                                        <th scope="col" class="text-center">Nama</th>
                                        <th scope="col" class="text-center">Jabatan</th>
                                        <th scope="col" class="text-center">Kelompok</th>
                                        <th scope="col" class="text-center">Golongan</th>
                                        <th scope="col" class="text-center">Masa Kerja (thn)</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawais as $pegawai)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $pegawai->NIP }}</td>
                                            <td>{{ $pegawai->nama }}</td>
                                            <td>{{ $pegawai->jabatan }}</td>
                                            <td>{{ $pegawai->nama_kelompok }}</td>
                                            <td>{{ $pegawai->golongan }}</td>
                                            <td>{{ $pegawai->masa_kerja }}</td>
                                            <td>{{ $pegawai->email }}</td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ url('dashboard/datapegawai/' . $pegawai->id . '/edit') }}" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                                    <a href="{{ url('dashboard/datacuti/' . $pegawai->id) }}" class="btn btn-success btn-sm"><i class="fa fa-calendar"></i></a>
                                                    <form action="{{ url('dashboard/datapegawai/' . $pegawai->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Data pegawai akan dihapus')"><i class="far fa-trash-alt"></i></button>
                                                    </form>
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