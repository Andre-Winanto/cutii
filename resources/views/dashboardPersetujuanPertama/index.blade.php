@extends('layouts.main')

@section('container')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
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

                        <div class="card-body mb-3 mt-1" style="padding-top: 5px;padding-bottom: 5px">
                            <h5 class="card-title mb-0" style="font-size: 24px; color: #000000; font-weight: bold;">Data Pengaju</h5>
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

                        <table class="table table-bordered table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th> <!-- Tambahkan kolom nama di sini -->
                                    <th scope="col">NIP</th>
                                    <th scope="col">Jenis Cuti</th>
                                    <th scope="col">Alasan Cuti</th>
                                    <th scope="col">Alamat Cuti</th>
                                    <th scope="col">Status Cuti</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($persetujuanPertamas as $persetujuanPertama)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $persetujuanPertama->pengajuanCuti->Pegawai->nama }}</td> <!-- Tambahkan nama di sini -->
                                        <td class="data-nip" data-nip={{ $persetujuanPertama->pengajuanCuti->NIP }}>
                                            {{ $persetujuanPertama->pengajuanCuti->NIP }}</td>
                                        <td>{{ $persetujuanPertama->pengajuanCuti->jenis_cuti }}</td>
                                        <td>{{ $persetujuanPertama->pengajuanCuti->alasan }}</td>
                                        <td>{{ $persetujuanPertama->pengajuanCuti->alamat_cuti }}</td>

                                        <td>
                                            {{-- {{ $persetujuanPertama->status }} --}}
                                            @if($persetujuanPertama->status == 'setuju')
                                                 <span class="badge bg-success"> DiSetujui </span>
                                            @elseif($persetujuanPertama->status == 'tolak')
                                            <span class="badge bg-danger"> DiTolak </span>
                                            @else
                                            <span class="badge bg-warning"> Belum Di Beri Keputusan </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-4">
                                                <a href="{{ url('dashboard/persetujuanpertama/' . $persetujuanPertama->id . '/show') }}"
                                                    class="btn btn-info"
                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                                margin-right: 5px"><i
                                                        class="fas fa-eye"></i></a>
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
@endsection