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

                        {{-- <div class="card-body">
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

                </div> --}}

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex gap-4">
                                        <h4 style="margin-right: 20px">Riwayat Pengajuan</h4>
                                        {{-- <a class="btn btn-primary">Buat Pengajuan</a> --}}
                                        {{-- 
                                        <a class="btn btn-primary" href="{{ url('dashboard/pengajuancuti/create') }}">Ajukan
                                            Cuti</a> --}}

                                        {{-- Button Trigger Modal --}}
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Cetak
                                            Laporan</button>

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
                                                    <th scope="col">Lihat Form</th>
                                                    <th scope="col">Cetak Surat</th>
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

                                                            @if ($pengajuanCuti->status == 'disetujui')
                                                                <span
                                                                    class="badge bg-success">{{ $pengajuanCuti->status }}</span>
                                                            @elseif($pengajuanCuti->status == 'tolak')
                                                                <span
                                                                    class="badge bg-danger">{{ $pengajuanCuti->status }}</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-warning">{{ $pengajuanCuti->status }}</span>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if ($pengajuanCuti->status == 'disetujui')
                                                                <a href="{{ url('dashboard/cetakcuti/' . $pengajuanCuti->id) }}"
                                                                    class="btn btn-success"
                                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                                margin-right: 5px"><i
                                                                        class="fas fa-file"></i></a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($pengajuanCuti->status == 'disetujui')
                                                                <a href="{{ url('dashboard/cetaksurat/' . $pengajuanCuti->id) }}"
                                                                    class="btn btn-success"
                                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                                margin-right: 5px"><i
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
        @endsection
