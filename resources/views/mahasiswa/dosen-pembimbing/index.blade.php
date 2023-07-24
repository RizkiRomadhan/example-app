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
                            <h3>Dosen Pembimbing</h3>
                        </div>
                        <div class="col-12 mt-4">

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
                                            <th scope="col">NIM</th>
                                            <th scope="col">Pembimbing 1</th>
                                            <th scope="col">Pembimbing 2</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($judul as $data)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $data->nama_mahasiswa }}</td>
                                                <td>{{ $data->nim }}</td>
                                                <td>{{ $data->dosen1->nama_dosen }}</td>
                                                <td>{{ $data->dosen2->nama_dosen }}</td>
                                                <td>{{ $data->status }}</td>
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
