@extends('app')

@include('koordinator.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('koordinator.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <div class="row">
                        <div class="col-12">
                            <h3>Jadwal Seminar</h3>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="row justify-content-between">
                                <div class="col-7 col-lg-9">
                                    <a class="btn btn-primary" href="{{ route('jadwal-seminar.create') }}"
                                        role="button">Tambah</a>
                                </div>
                                <div class="col-5 col-lg-3">
                                    <div class="input-group mb-3 align-self-end" style="display: flex;">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><i
                                                class="fas fa-search"></i></span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default">
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
                                            <th scope="col">Nama Mahasiswa</th>
                                            <th scope="col">Pembimbing 1</th>
                                            <th scope="col">Pembimbing 2</th>
                                            <th scope="col">Penguji 1</th>
                                            <th scope="col">Penguji 2</th>
                                            <th scope="col">Waktu</th>
                                            <th scope="col">Ruangan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" style="width: 10em;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($seminar as $sm)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $sm->nama_mahasiswa }}</td>
                                                <td>{{ $sm->nama_dosen1 }}</td>
                                                <td>{{ $sm->nama_dosen2 }}</td>
                                                <td>{{ $sm->nama_penguji1 }}</td>
                                                <td>{{ $sm->nama_penguji2 }}</td>
                                                <td>{{ $sm->waktu }}</td>
                                                <td>{{ $sm->ruangan }}</td>
                                                <td>{{ $sm->status }}</td>
                                                <td>
                                                    <form action="{{ route('jadwal-seminar.destroy', $sm->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="{{ route('jadwal-seminar.edit', $sm->id) }}"
                                                            class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10">Tidak ada data yang dapat ditampilkan.</td>
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
