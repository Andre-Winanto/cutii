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
                            <div class="card-body" style="padding-top: 5px;padding-bottom: 5px">
                                <div class="alert alert-success alert-dismissible m-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif

                        @if (session()->has('errorJatahCuti'))
                            <div class="card-body" style="padding-top: 5px;padding-bottom: 5px">
                                <div class="alert alert-warning alert-dismissible m-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('errorJatahCuti') }}
                                </div>
                            </div>
                        @endif

                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ url('dashboard/datapegawai/create') }}">Tambah</a>

                            {{-- Button Trigger Modal --}}
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cetak
                                Laporan</button>

                            <a class="btn btn-success" href="{{ url('dashboard/tambahjatahtahunan') }}">Tambah Jatah
                                Tahunan</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ url('dashboard/laporan') }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="">
                                                    <label for="tanggal_awal"
                                                        class="col-12 text-end control-label col-form-label">Tanggal
                                                        Awal</label>
                                                    <div class="col-12">
                                                        <input type="date" class="form-control" name="tanggal_awal"
                                                            id="tanggal_awal" placeholder="Tanggal Awal" required />
                                                    </div>
                                                </div>

                                                <div class="tanggal_akhir">
                                                    <label for="tanggal_akhir"
                                                        class="col-12 text-end control-label col-form-label">Tanggal
                                                        Akhir</label>
                                                    <div class="col-12">
                                                        <input type="date" class="form-control" name="tanggal_akhir"
                                                            placeholder="Tanggal Akhir" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Cetak</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body" style="padding-top: 5px;padding-bottom: 5px">
                            <h5 class="card-title mb-0">Data Pegawai</h5>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Kelompok</th>
                                    <th scope="col">Golongan</th>
                                    <th scope="col">Masa Kerja (thn)</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($pegawais as $pegawai)
                                <tbody>
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
                                            <div class="d-flex gap-4">
                                                <a href="{{ url('dashboard/datapegawai/' . $pegawai->id . '/edit') }}"
                                                    class="btn btn-warning"
                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                                    margin-right: 5px"><i
                                                        class="far fa-edit"></i></a>

                                                <a href="{{ url('dashboard/datacuti/' . $pegawai->id) }}"
                                                    class="btn btn-success"
                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                                    margin-right: 5px"><i
                                                        class="fa fa-calendar"></i></a>

                                                <form action="{{ url('dashboard/datapegawai/' . $pegawai->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn btn-danger"
                                                        onclick=" return confirm('Data pegawai akan dihapus')"
                                                        style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
