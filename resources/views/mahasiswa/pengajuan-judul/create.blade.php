@extends('app')

@include('mahasiswa.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('mahasiswa.sidebar')
            <main style="display: flex; flex-direction: column; justify-content: space-between;"
                class="col-md-9 ms-sm-auto col-lg-10 px-md-4 border-bottom">
                <div class="pt-3 pb-2 mb-3">

                    <div class="row">
                        <div class="col-12">

                            <h3>Pengajuan Judul</h3>
                            <form style="margin-top: 2em;" action="{{ route('pengajuan-judul.store') }}" method="POST">
                                {{ csrf_field() }}
                                @method('POST')
                                <div class="mb-3 row">
                                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="judul"
                                            class="form-control @error('judul') is-invalid @enderror" id="judul"
                                            value="{{ old('judul') }}">

                                        @error('judul')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('nim') is-invalid @enderror" id="nim"
                                            name="nim">

                                            @foreach ($mahasiswa as $data)
                                                <option value="{{ $data->nim }}">{{ $data->nim }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_mahasiswa"
                                            class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                            id="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}">

                                        @error('nama_mahasiswa')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div style="display: flex; justify-content: flex-end; margin-bottom: 2em;">
                                    <button class="btn btn-success" type="submit">Kirim</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
@endsection
