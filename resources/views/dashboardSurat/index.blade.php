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

                        <div class="card-body mb-3 mt-1" style="padding-top: 5px;padding-bottom: 5px">
                            <h5 class="card-title mb-0">Data Surat</h5>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Tanggal Disahkan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($surats as $surat)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $surat->no_surat }}</td>
                                        <td>{{ $surat->tanggal_disahkan }}</td>
                                        <td>

                                            <div class="d-flex gap-4">
                                                <a href="{{ url('dashboard/surat/' . $surat->id . '/show') }}"
                                                    class="btn btn-info"
                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                            margin-right: 5px"><i
                                                        class="fas fa-eye"></i></a>

                                                {{-- Button Trigger Modal --}}
                                                <button class="btn btn-warning"
                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                                    margin-right: 5px"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                        class="far fa-edit"></i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ url('dashboard/surat') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $surat->id }}" required>
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        Surat</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
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
                                                                                name="no_surat"
                                                                                value="{{ old('no_surat') }}" id="no_surat"
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
                                                                                name="tanggal_disahkan"
                                                                                value="{{ old('tanggal_disahkan') }}"
                                                                                id="tanggal_disahkan"
                                                                                placeholder="Tanggal Disahkan" required />
                                                                            @error('tanggal_disahkan')
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
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
