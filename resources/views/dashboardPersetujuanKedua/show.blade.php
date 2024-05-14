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

                            @if (!$persetujuanKedua->status)
                                {{-- Button Trigger Modal --}}
                                <button class="btn btn-warning"
                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                                        margin-right: 5px"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">Beri Persetujuan</button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ url('dashboard/persetujuankedua/' . $persetujuanKedua->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Beri
                                                        Persetujuan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="">
                                                        <label for="status"
                                                            class="col-12 text-end control-label col-form-label">Status
                                                            Cuti</label>
                                                        <div class="col-12">
                                                            <select
                                                                class="shadow-none @error('status') is-invalid @enderror"
                                                                style="width: 100%; height: 36px" name="status" required>
                                                                <option value="">Pilih</option>
                                                                <option value="{{ 'setuju' }}">
                                                                    Setuju
                                                                </option>
                                                                <option value="{{ 'tolak' }}">
                                                                    Tolak
                                                                </option>
                                                            </select>
                                                            @error('status')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                        <label for="keterangan"
                                                            class="col-12 text-end control-label col-form-label">keterangan</label>
                                                        <div class="col-12">
                                                            <input type="text"
                                                                class="form-control @error('keterangan') is-invalid @enderror"
                                                                name="keterangan" value="{{ old('keterangan') }}"
                                                                id="keterangan" placeholder="Keterangan" />
                                                            @error('keterangan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        onclick="return confirm('Data akan disimpan dan tidak dapat diubah lagi!')">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif

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
