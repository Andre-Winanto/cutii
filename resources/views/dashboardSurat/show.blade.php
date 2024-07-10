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
                            <h5 class="card-title mb-0">Data Pengajuan Cuti </h5>
                            <br>
                            {{-- Button Trigger Modal --}}
                            <button class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Surat</button>

                          

                            {{-- modal --}}
                            {{-- <button class="btn btn-warning"
                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                            margin-right: 5px"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-edit"></i></button> --}}

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ url('dashboard/surat') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}" required>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Surat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    </buttone>
                                            </div>
                                            <div class="modal-body">

                                                <div class="">
                                                    <label for="status"
                                                        class="col-12 text-end control-label col-form-label">No
                                                        Surat</label>
                                                    <div class="col-12">
                                                        <input type="text"
                                                            class="form-control @error('no_surat') is-invalid @enderror"
                                                            name="no_surat" value="{{ old('no_surat') }}" id="no_surat"
                                                            placeholder="no surat" required />
                                                        @error('no_surat')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <label for="tanggal_disahkan"
                                                        class="col-12 text-end control-label col-form-label">Tanggal
                                                        Disahkan</label>
                                                    <div class="col-12">
                                                        <input type="date"
                                                            class="form-control @error('tanggal_disahkan') is-invalid @enderror"
                                                            name="tanggal_disahkan" value="{{ old('tanggal_disahkan') }}"
                                                            id="tanggal_disahkan" placeholder="Tanggal Disahkan" required />
                                                        @error('tanggal_disahkan')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <label for="nama"
                                                        class="col-12 text-end control-label col-form-label">Nama Penanda Tangan
                                                        </label>
                                                    <div class="col-12">
                                                        <input type="text"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            name="nama" value="{{ old('nama') }}" id="nama"
                                                            placeholder="Masukan nama" required />
                                                        @error('nama')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <label for="nip"
                                                        class="col-12 text-end control-label col-form-label">NIP</label>
                                                    <div class="col-12">
                                                        <input type="text"
                                                            class="form-control @error('nip') is-invalid @enderror"
                                                            name="nip" value="{{ old('nip') }}" id="nip"
                                                            placeholder="NIP" required />
                                                        @error('nama')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <label for="penanda_tangan" class="col-12 text-end control-label col-form-label">Penanda Tangan</label>
                                                    <div class="col-12">
                                                        <select class="form-control @error('penanda_tangan') is-invalid @enderror" name="penanda_tangan" id="penanda_tangan" required>
                                                            <option value="">Pilih</option>
                                                            <option value="Kepala Balai" {{ old('penanda_tangan') == 'Kepala Balai' ? 'selected' : '' }}>Kepala Balai</option>
                                                            <option value="plh.Balai" {{ old('penanda_tangan') == 'plh.Balai' ? 'selected' : '' }}>plh.Balai</option>
                                                        </select>
                                                        @error('penanda_tangan')
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
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>


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
                                            {{ date('d-m-Y', strtotime($data->tanggal_disahkan)) }}
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
                                    <tr>
                                        <td>
                                            Surat
                                        </td>
                                        <td>
                                            <a href="{{ url('dashboard/cetaksuratadmin/' . $persetujuanKedua->persetujuanPertama->pengajuanCuti->id) }}"
                                                class="btn btn-info"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                    margin-right: 5px"><i
                                                    class="fas fa-file"></i></a>
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