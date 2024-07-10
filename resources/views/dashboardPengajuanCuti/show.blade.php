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
                        <div class="card-body">
                            <h5 class="card-title mb-3">Data Pengajuan Cuti</h5>
                        </div>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        Nama
                                    </td>
                                    <td>
                                        {{ $getDataPegawai->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        NIP
                                    </td>
                                    <td>
                                        {{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->NIP }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Jenis Cuti
                                    </td>
                                    <td>
                                        {{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->jenis_cuti }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Alasan
                                    </td>
                                    <td>
                                        {{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->alasan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal Mulai
                                    </td>
                                    <td>
                                        {{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->tanggal_mulai_cuti }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal Akhir
                                    </td>
                                    <td>
                                        {{ $persetujuanKedua->persetujuanPertama->pengajuanCuti->tanggal_akhir_cuti }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Status Persetujuan Pertama
                                    </td>
                                    <td>
                                        @if ($persetujuanKedua->persetujuanPertama->status == 'setuju')
                                            <span class="badge bg-success">{{ $persetujuanKedua->persetujuanPertama->status }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $persetujuanKedua->persetujuanPertama->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Keterangan Persetujuan Pertama
                                    </td>
                                    <td>
                                        {{ $persetujuanKedua->persetujuanPertama->keterangan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Status Persetujuan Kedua
                                    </td>
                                    <td>
                                        @if ($persetujuanKedua->status == 'setuju')
                                            <span class="badge bg-success">{{ $persetujuanKedua->status }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $persetujuanKedua->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Keterangan Persetujuan Kedua
                                    </td>
                                    <td>
                                        {{ $persetujuanKedua->keterangan }}
                                    </td>
                                </tr>
                                @if (!is_null($persetujuanKedua->persetujuanPertama->pengajuanCuti->file))
                                    <tr>
                                        <td>
                                            File
                                        </td>
                                        <td>
                                            <a href="{{ asset('file/' . $persetujuanKedua->persetujuanPertama->pengajuanCuti->file) }}"
                                                class="btn btn-warning"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                        margin-right: 5px"><i
                                                    class="fas fa-file"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
