@extends('layouts.main')

@section('container')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('errorJumlahCuti'))
                            <div class="card-body py-1">
                                <div class="alert alert-danger alert-dismissible m-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('errorJumlahCuti') }}
                                </div>
                            </div>
                        @endif

                        <div class="card-body py-1">
                            <h5 class="card-title mb-0" style="font-size: 24px; color: #000000; font-weight: bold;">Data Pengajuan Cuti</h5>
                        </div>

                        <style>
                            .table thead th, .table tbody td, .table tbody th {
                                text-align: center;
                                vertical-align: middle;
                            }
                            .table thead th {
                                border-bottom: 2px solid #dee2e6;
                                background: linear-gradient(to bottom, #4ee448 0%, #eaec59 100%);
                            }
                        </style>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Jenis Cuti</th>
                                        <th scope="col">Alasan Cuti</th>
                                        <th scope="col">Alamat Cuti</th>
                                        <th scope="col">Status Cuti</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($persetujuanKeduas as $persetujuanKedua)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->pegawai->nama }}</td>
                                            <td>{{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->NIP }}</td>
                                            <td>{{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->jenis_cuti }}</td>
                                            <td>{{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->alasan }}</td>
                                            <td>{{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->alamat_cuti }}</td>
                                            <td>
                                                @if($persetujuanKedua->persetujuanPertama->pengajuanCuti->status == 'disetujui')
                                                    <span class="badge bg-success">{{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->status }}</span>
                                                @elseif($persetujuanKedua->persetujuanPertama->pengajuanCuti->status == 'tolak')
                                                    <span class="badge bg-danger">{{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->status }}</span>
                                                @else
                                                    <span class="badge bg-warning">Belum Di Beri Keputusan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ url('dashboard/persetujuankedua/' . $persetujuanKedua->id . '/show') }}" class="btn btn-info btn-sm">
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
        .page-wrapper {
            margin: 20px;
        }

        .page-breadcrumb {
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 24px;
            color: #000000;
            font-weight: bold;
        }

        .table-responsive {
            margin-top: 10px;
        }
    </style>
@endsection