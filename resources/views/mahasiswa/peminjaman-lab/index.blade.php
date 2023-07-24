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
                            <h3>Peminjaman Lab</h3>
                        </div>
                        <div class="row justify-content-between">
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
                                        <th scope="col">Nama Lab</th>
                                        <th scope="col">Nama Laboran</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" style="width: 10em">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($lab as $data)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $data->nama_lab }}</td>
                                            <td>{{ $data->nama_laboran }}</td>
                                            <td>{{ $data->waktu }} </td>
                                            <td>{{ $data->status }}</td>
                                            <td>
                                                @if ($data->status == 'Kosong')
                                                    <form action="{{ route('peminjaman-lab.update', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <button type="submit" class="btn btn-danger">Pinjam</button>
                                                    @elseif ($data->status == 'Diterima' && $data->nama_mahasiswa == $nama)
                                                        <form action="{{ route('peminjaman-lab.absen', $data->id) }}"
                                                            method="GET">

                                                            {{-- <input type="hidden" name="id" value="{{ $lab->id }}"> --}}

                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="far fa-calendar-alt"></i> Absen</button>
                                                        @elseif ($data->status == 'Diterima' && $data->nama_mahasiswa != $nama)
                                                            <p>Dipinjam</p>
                                                @endif
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
                            <button class="btn btn-success" type="button"> Next <i class="fas fa-chevron-circle-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
