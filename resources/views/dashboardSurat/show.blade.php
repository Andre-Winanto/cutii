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
                            <h5 class="card-title mb-0">Data Pengajuan Cuti</h5>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        Nama
                                    </td>
                                    <td>
                                        {{ $dataPegawai->nama }}
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
                                            <span
                                                class="badge bg-success">{{ $persetujuanKedua->persetujuanPertama->status }}</span>
                                        @else
                                            <span
                                                class="badge bg-danger">{{ $persetujuanKedua->persetujuanPertama->status }}</span>
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
                                <tr>
                                    <td>
                                        Nomor Surat
                                    </td>
                                    <td>
                                        {{ $data->no_surat }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal Disahkan
                                    </td>
                                    <td>
                                        {{ $persetujuanKedua->tanggal_disahkan }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
