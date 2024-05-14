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
                            <h5 class="card-title mb-3">Data Pengajuan Cuti</h5>

                            @if (!$persetujuanPertama->status)
                                {{-- Button Trigger Modal --}}
                                <button class="btn btn-warning "
                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                margin-right: 5px"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">Beri Persetujuan</button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form
                                                action="{{ url('dahsboard/persetujuanpertama/' . $persetujuanPertama->id) }}"
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
                                        {{ $nama->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        NIP
                                    </td>
                                    <td>
                                        {{ $persetujuanPertama->pengajuanCuti->NIP }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Jenis Cuti
                                    </td>
                                    <td>
                                        {{ $persetujuanPertama->pengajuanCuti->jenis_cuti }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Alasan
                                    </td>
                                    <td>
                                        {{ $persetujuanPertama->pengajuanCuti->alasan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal Mulai
                                    </td>
                                    <td>
                                        {{ $persetujuanPertama->pengajuanCuti->tanggal_mulai_cuti }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal Akhir
                                    </td>
                                    <td>
                                        {{ $persetujuanPertama->pengajuanCuti->tanggal_akhir_cuti }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Status
                                    </td>
                                    <td>
                                        <span class="badge bg-success">{{ $persetujuanPertama->status }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Keterangan
                                    </td>
                                    <td>
                                        {{ $persetujuanPertama->keterangan }}
                                    </td>
                                </tr>
                                @if (!is_null($persetujuanPertama->pengajuanCuti->file))
                                    <tr>
                                        <td>
                                            File
                                        </td>
                                        <td>
                                            <a href="{{ asset('file/' . $persetujuanPertama->pengajuanCuti->file) }}"
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
