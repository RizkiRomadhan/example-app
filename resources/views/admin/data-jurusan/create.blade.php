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
                            <h3>Simpan Data Jurusan</h3>
                        </div>

                        <div class="col-12 mt-4">
                            <form action="{{ route('data-jurusan.store') }}" method="POST">
                                @csrf
                                @method('POST')

                                <div class="mb-3 row">
                                    <label for="id_jurusan" class="col-sm-2 col-form-label">ID Jurusan</label>
                                    <div class="col-sm-10">
                                        <input
                                            type="name"
                                            class="form-control @error('id_jurusan') is-invalid @enderror"
                                            id="id_jurusan"
                                            name="id_jurusan"
                                            value="{{ old('id_jurusan') }}">

                                        @error('id_jurusan')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nama_jurusan" class="col-sm-2 col-form-label">Nama Jurusan</label>
                                    <div class="col-sm-10">
                                        <input type="name"
                                            class="form-control @error('nama_jurusan') is-invalid @enderror"
                                            id="nama_jurusan" name="nama_jurusan" value="{{ old('nama_jurusan') }}">
                                        @error('nama_jurusan')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                                    <button class="btn btn-success" type="submit">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
