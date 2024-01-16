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
                        <form class="form-horizontal" action="{{ url('dashboard/datapegawai') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Data Pegawai</h4>
                                <div class="form-group row">
                                    <label for="NIP" class="col-sm-3 text-end control-label col-form-label">NIP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('NIP') is-invalid @enderror"
                                            name="NIP" value="{{ old('NIP') }}" id="NIP"
                                            placeholder="Masukan NIP" />
                                        @error('NIP')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group
                                            row">
                                    <label for="nama"
                                        class="col-sm-3 text-end control-label col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" value="{{ old('nama') }}" id="nama"
                                            placeholder="Masukan Nama" />
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jabatan"
                                        class="col-sm-3 text-end control-label col-form-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                            name="jabatan" value="{{ old('jabatan') }}" id="jabatan"
                                            placeholder="Masukan Jabatan" />
                                        @error('jabatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="masa_kerja" class="col-sm-3 text-end control-label col-form-label">Masa
                                        Kerja (thn)</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control @error('masa_kerja') is-invalid @enderror"
                                            name="masa_kerja" value="{{ old('masa_kerja') }}" id="masa_kerja"
                                            placeholder="Masukan Masa Kerja" step="any" />
                                        @error('masa_kerja')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-sm-3 text-end control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" id="email"
                                            placeholder="Masukan Masa Kerja" step="any" />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-sm-3 text-end control-label col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('password') is-invalid @enderror"
                                            name="password" value="{{ old('password') }}" id="password"
                                            placeholder="Masukan Masa Kerja" step="any" />
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <a class="btn btn-primary" style="margin-right: 10px"
                                            href="{{ url('dashboard/datapegawai') }}">Kembali</a>
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
