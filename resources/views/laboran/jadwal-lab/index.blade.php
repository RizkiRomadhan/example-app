@extends('app')

@include('laboran.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('laboran.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <div class="row">
                        <div class="col-12">
                            <h3>Jadwal Lab</h3>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="row justify-content-between">
                                <div class="col-7 col-lg-9">
                                    <a class="btn btn-primary" href="{{ route('jadwal-lab.create') }}"
                                        role="button">Tambah</a>
                                </div>
                                <div class="col-5 col-lg-3">
                                    <div class="input-group mb-3 align-self-end" style="display: flex;">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Cari</span>
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
                                            <th scope="col" style="width: 10em;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($lab as $lb)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $lb->nama_lab }}</td>
                                                <td>{{ $lb->nama_laboran }}</td>
                                                <td>{{ $lb->waktu }}</td>
                                                <td>{{ $lb->status }}</td>
                                                <td>
                                                    <form action="{{ route('jadwal-lab.destroy', $lb->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="{{ route('jadwal-lab.edit', $lb->id) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
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
                            <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success me-md-2" type="button">Prev</button>
                                <button class="btn btn-success" type="button">Next</button>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
@endsection
