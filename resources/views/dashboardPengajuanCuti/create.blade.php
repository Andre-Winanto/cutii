@extends('layouts.main')

@section('container')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        @if (session()->has('errorJumlahCuti'))
                            <div class="card-body" style="padding-top: 5px;padding-bottom: 5px">
                                <div class="alert alert-danger alert-dismissible m-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('errorJumlahCuti') }}
                                </div>
                            </div>
                        @endif

                        <form class="form-horizontal" action="{{ url('dashboard/pengajuancuti') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Ajukan Cuti</h4>
                                <input type="hidden" name="NIP" value="{{ Auth::guard('pegawai')->user()->NIP }}">
                                <input type="hidden" name="nama_kelompok"
                                    value="{{ Auth::guard('pegawai')->user()->nama_kelompok }}">
                                <div class="form-group
                                        row">
                                    <label for="jenis_cuti" class="col-sm-3 text-end control-label col-form-label">Jenis
                                        Cuti</label>
                                    <div class="col-sm-9">
                                        <select class="shadow-none @error('jenis_cuti') is-invalid @enderror"
                                            style="width: 100%; height: 36px" name="jenis_cuti" required>
                                            <option value="">Pilih</option>
                                            @foreach ($jenisCutis as $jenisCuti)
                                                <option value="{{ $jenisCuti }}">{{ $jenisCuti }}</option>
                                            @endforeach
                                        </select>
                                        @error('jenis_cuti')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alasan"
                                        class="col-sm-3 text-end control-label col-form-label">Alasan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('alasan') is-invalid @enderror"
                                            name="alasan" value="{{ old('alasan') }}" id="alasan"
                                            placeholder="Masukan Alasan" />
                                        @error('alasan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tanggal_mulai_cuti"
                                        class="col-sm-3 text-end control-label col-form-label">Tanggal Mulai Cuti</label>
                                    <div class="col-sm-9">
                                        <input type="date"
                                            class="form-control @error('tanggal_mulai_cuti') is-invalid @enderror"
                                            name="tanggal_mulai_cuti" value="{{ old('tanggal_mulai_cuti') }}"
                                            id="tanggal_mulai_cuti" placeholder="Masukan Masa Kerja" step="any" />
                                        @error('tanggal_mulai_cuti')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tanggal_akhir_cuti"
                                        class="col-sm-3 text-end control-label col-form-label">Tanggal Akhir Cuti</label>
                                    <div class="col-sm-9">
                                        <input type="date"
                                            class="form-control @error('tanggal_akhir_cuti') is-invalid @enderror"
                                            name="tanggal_akhir_cuti" value="{{ old('tanggal_akhir_cuti') }}"
                                            id="tanggal_akhir_cuti" placeholder="Masukan Masa Kerja" step="any" />
                                        @error('tanggal_akhir_cuti')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="alamat_cuti"
                                        class="col-sm-3 text-end control-label col-form-label">alamat_cuti</label>
                                    <div class="col-sm-9">
                                        <input type="alamat_cuti"
                                            class="form-control @error('alamat_cuti') is-invalid @enderror"
                                            name="alamat_cuti" value="{{ old('alamat_cuti') }}" id="alamat_cuti"
                                            placeholder="Masukan Alamat Cuti" />
                                        @error('alamat_cuti')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <a class="btn btn-primary" style="margin-right: 10px"
                                            href="{{ url('dashboard/pengajuancuti') }}">Kembali</a>
                                        <button type="submit" class="btn btn-primary">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
