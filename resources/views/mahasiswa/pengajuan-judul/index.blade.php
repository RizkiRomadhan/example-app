@extends('app')
@include('mahasiswa.header')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('mahasiswa.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <div class="row">
                        <div class="col-12">
                            <h3>Pengajuan Judul</h3>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="row justify-content-between">
                                <div class="col-7 col-lg-9">
                                    <a class="btn btn-primary" href="{{ route('pengajuan-judul.create') }}"
                                        role="button">Tambah</a>
                                </div>
                                <div class="col-5 col-lg-3">
                                    <div class="input-group mb-3 align-self-end" style="display: flex;">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><i
                                                class="fas fa-search"></i></span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default" placeholder="Search disini...">
                                    </div>
                                </div>
                            </div>

                            @if (session()->has('message'))
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get('message') }}
                                    </div>
                                </div>
                            @endif

                            <div class="col-12 w-full overflow-auto">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Nama Mahasiswa</th>
                                            <th scope="col">NIM</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($judul as $data)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $data->judul }}</td>
                                                <td>{{ $data->nama_mahasiswa }}</td>
                                                <td>{{ $data->nim }}</td>
                                                <td>{{ $data->status }}</td>
                                                <td class="gap-2" style="display: flex;">
                                                    <form action="{{ route('pengajuan-judul.edit', $data->id) }}"
                                                        method="GET">
                                                        <button class="btn btn-warning">
                                                            <i class="far fa-edit"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('pengajuan-judul.destroy', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                    <form action="{{ route('pengajuan-judul.berkas', $data->id) }}"
                                                        method="GET">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-secondary"><i
                                                                class="fas fa-file-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9">Tidak ada data yang dapat ditampilkan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success me-md-2" type="button"><i
                                        class="fas fa-chevron-circle-left"></i>
                                    Prev</button>
                                <button class="btn btn-success" type="button"> Next <i
                                        class="fas fa-chevron-circle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
@endsection
