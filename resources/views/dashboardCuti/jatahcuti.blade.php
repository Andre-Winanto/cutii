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

                        <div class="card-body" style="padding-top: 5px;padding-bottom: 5px">
                            <h5 class="card-title mb-0">Jatah Cuti Atas Nama  = {{ $pegawai->nama }}</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color: #9be65d;">
                                    <tr>
                                
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Jatah</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jatahCutis as $data)
                                        <tr>
                                         
                                            <td>{{ $data->tahun }}</td>
                                            <td>{{ $data->jatah }}</td>
                                            <td>
                                                <div class="d-flex gap-4">
                                                    <a class="btn btn-warning btn-sm"
                                                        href="{{ url('dashboard/jatah/' . $data->id . '/edit') }}">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </div>
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
@endsection