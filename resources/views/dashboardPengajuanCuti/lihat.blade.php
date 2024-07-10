@extends('layouts.main')

@section('container')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('success'))
                            <div class="card-body">
                                <div class="alert alert-success alert-dismissible m-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif

                        
                       

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ url('dashboard/laporan') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="">
                                            <label for="tanggal_awal"
                                                class="col-12 text-end control-label col-form-label">Tanggal
                                                Awal</label>
                                            <div class="col-12">
                                                <input type="date" class="form-control"
                                                    name="tanggal_awal" id="tanggal_awal"
                                                    placeholder="Tanggal Awal" required />
                                            </div>
                                        </div>

                                        <div class="tanggal_akhir">
                                            <label for="tanggal_akhir"
                                                class="col-12 text-end control-label col-form-label">Tanggal
                                                Akhir</label>
                                            <div class="col-12">
                                                <input type="date" class="form-control"
                                                    name="tanggal_akhir" placeholder="Tanggal Akhir"
                                                    required>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cetak
                                        Laporan</button>
                                </div>
                                <div class="card-body">
                                    <div class="card-body">
                                        <h5 class="card-title mb-0">Riwayat Pengajuan</h5>
                                        
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th scope="col" class="text-center">No</th>
                                                    <th scope="col" class="text-center">Nama Pegawai</th>
                                                    <th scope="col" class="text-center">Jenis Cuti</th>
                                                    <th scope="col" class="text-center">Alasan</th>
                                                    <th scope="col" class="text-center">Tanggal Mulai</th>
                                                    <th scope="col" class="text-center">Tanggal Akhir</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                    <th scope="col" class="text-center">Cetak Form</th>
                                                    <th scope="col" class="text-center">Cetak Surat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pengajuanCutis as $index => $pengajuanCuti)
                                                    <tr>
                                                        <td class="text-center">{{ $index + 1 }}</td>
                                                        <td>{{ $pengajuanCuti->pegawai->nama }}</td>
                                                        <td>{{ $pengajuanCuti->jenis_cuti }}</td>
                                                        <td>{{ $pengajuanCuti->alasan }}</td>
                                                        <td>{{ $pengajuanCuti->tanggal_mulai_cuti }}</td>
                                                        <td>{{ $pengajuanCuti->tanggal_akhir_cuti }}</td>
                                                        <td>
                                                            @if($pengajuanCuti->status == 'disetujui')
                                                                <span class="badge bg-success">{{ $pengajuanCuti->status }}</span>
                                                            @elseif($pengajuanCuti->status == 'tolak')
                                                                <span class="badge bg-danger">{{ $pengajuanCuti->status }}</span>
                                                            @else
                                                            <span class="badge bg-warning"> Masih di Proses </span>
                                                            @endif
                                                        </td>

                                                        <td class="text-center">
                                                            @if ($pengajuanCuti->status == 'disetujui')
                                                                <a href="{{ url('dashboard/cetakformadmin/' . $pengajuanCuti->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fas fa-file"></i></a>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($pengajuanCuti->status == 'disetujui')
                                                                <a href="{{ url('dashboard/cetaksuratadmin/' . $pengajuanCuti->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fas fa-file"></i></a>
                                                            @endif
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
            </div>
        </div>
    </div>
@endsection