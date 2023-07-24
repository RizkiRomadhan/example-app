@extends('app')

@include('admin.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <div class="row">
                        <div class="col-12">
                            <h3>Data Prodi</h3>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="row justify-content-between">
                                <div class="col-7 col-lg-9">
                                    <a class="btn btn-primary" href=" {{ route('data-prodi.create') }}"
                                        role="button">Tambah</a>
                                </div>
                                <div class="col-5 col-lg-3">
                                    <div class="input-group mb-3 align-self-end" style="display: flex;">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><i
                                                class="fas fa-search"></i></span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default" placeholder="Search here...">
                                    </div>
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
                                        <th scope="col">ID Prodi</th>
                                        <th scope="col">Nama Jurusan</th>
                                        <th scope="col">Nama Prodi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($prodi as $data)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $data->id_prodi }}</td>
                                            <td>{{ $data->jurusan->nama_jurusan ?? 'Jurusan dihapus' }}</td>
                                            <td>{{ $data->nama_prodi }}</td>
                                            <td>
                                                <form action="{{ route('data-prodi.destroy', $data->id_prodi) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="{{ route('data-prodi.edit', $data->id_prodi) }}"
                                                        class="btn btn-warning"><i class="far fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Tidak ada data yang dapat ditampilkan.</td>
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
