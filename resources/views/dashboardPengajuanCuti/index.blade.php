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

                        <div class="card-body">
                            <h4>Sisa Cuti</h4>
                            <table class="table mb-3">
                                <thead>
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

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-4">
                                <h4 style="margin-right: 20px">Riwayat Pengajuan</h4>
                                {{-- <a class="btn btn-primary">Buat Pengajuan</a> --}}

                                <a class="btn btn-primary" href="{{ url('dashboard/pengajuancuti/create') }}">Ajukan
                                    Cuti</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Jenis Cuti</th>
                                        <th scope="col">Alasan</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <th scope="col">Tanggal Akhir</th>
                                        <th scope="col">Alamat Cuti</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
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
                                            <td>{{ $pengajuanCuti->status }}</td>
                                            <td>{{ $pengajuanCuti->status }}</td>
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
    </div>
@endsection
