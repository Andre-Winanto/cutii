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

                        <form class="form-horizontal" action="{{ url('dashboard/jatah/' . $jatah->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Edit Jatah Cuti</h4>

                                <div class="form-group row">
                                    <label for="tahun"
                                        class="col-sm-3 text-end control-label col-form-label">Tahun</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control @error('tahun') is-invalid @enderror"
                                            name="tahun" value="{{ old('tahun', $jatah->tahun) }}" id="tahun"
                                            placeholder="Masukan Alasan" readonly />
                                        @error('tahun')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="jatah"
                                        class="col-sm-3 text-end control-label col-form-label">Jatah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('jatah') is-invalid @enderror"
                                            name="jatah" value="{{ old('jatah', $jatah->jatah) }}" id="jatah"
                                            placeholder="Masukan Alasan" />
                                        @error('jatah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
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
