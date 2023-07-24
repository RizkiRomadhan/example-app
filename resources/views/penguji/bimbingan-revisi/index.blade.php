@extends('app')

@include('penguji.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('penguji.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <div class="row">
                        <div class="col-12">
                            <h3>Revisi Proposal</h3>
                            <div class="row justify-content-between mt-4">
                                <div class="col-3">
                                    <div class="input-group mb-3 align-self-end">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><i
                                                class="fas fa-search"></i></span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 w-full overflow-auto">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($revisi as $data)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{!! $data->judul !!}</td>
                                            <td>{!! $data->deskripsi !!}</td>
                                            <td>{!! $data->waktu !!}</td>
                                            <td>
                                                <div class="text-center">
                                                    <img src="{{ asset('img/' . $data->gambar) }}" alt="screnshoot"
                                                        class="w-25">
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{ route('bimbingan-proposal.destroy', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="{{ route('bimbingan-revisi.edit', $data->id) }}"
                                                        class="btn btn-warning"><i class="far fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i></button>
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
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
