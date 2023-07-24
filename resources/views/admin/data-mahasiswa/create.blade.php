@extends('app')

@include('admin.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')
            <main style="display: flex; flex-direction: column; justify-content: space-between;"
                class="col-md-9 ms-sm-auto col-lg-10 px-md-4 border-bottom">
                <div class="pt-3 pb-2 mb-3">

                    <div class="row">
                        <div class="col-12">

                            <h3>Data Mahasiswa</h3>
                            <form action="{{ route('data-mahasiswa.store') }}" method="POST">
                                {{ csrf_field() }}
                                @method('POST')

                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_mahasiswa"
                                                class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                                id="inputname">
                                            @error('nama_mahasiswa')
                                                <div class="text-danger mt-2">
                                                    Anda harus mengisi bagian ini!
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputtext" class="col-sm-2 col-form-label">Nim</label>
                                        <div class="col-sm-10">
                                            <input
                                                type="text"
                                                name="nim"
                                                class="form-control @error('nim') is-invalid @enderror"
                                                id="inputnim"
                                                value="{{ old('nim') }}">

                                                @error('nim')
                                                    <div class="text-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputjurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                        <div class="col-sm-10">
                                            <select class="form-select @error('jurusan') is-invalid @enderror"
                                                id="jurusan" name="id_jurusan">
                                                <option value="">Pilihlah Nama Jurusan</option>
                                                @foreach ($jurusan as $data)
                                                    <option value="{{ $data->id_jurusan }}">{{ $data->nama_jurusan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('jurusan')
                                            <div class="text-danger mt-2">
                                                Silahkan Pilih Jurusan Anda Terlebih Dahulu
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputprodi" class="col-sm-2 col-form-label">Program Studi</label>
                                        <div class="col-sm-10">
                                            <select class="form-select @error('prodi') is-invalid @enderror"
                                                id="prodi" name="id_prodi">
                                                <option value="">Pilihlah Nama Prodi</option>
                                                @foreach ($prodi as $data)
                                                    <option value="{{ $data->id_prodi }}">{{ $data->nama_prodi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('prodi')
                                            <div class="text-danger mt-2">
                                                Silahkan Pilih Jurusan Anda Terlebih Dahulu
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email"
                                            class="form-control
                                                @error('email') is-invalid @enderror" id="inputEmail">
                                            @error('email')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputnomor_ponsel" class="col-sm-2 col-form-label">Nomor Ponsel</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                            name="nomor_ponsel"
                                            class="form-control
                                                @error('nomor_ponsel') is-invalid @enderror"
                                                id="inputNohp">
                                            @error('nomor_ponsel')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="status" 
                                            class="form-control
                                                @error('status') is-invalid @enderror" id="inputStatus">
                                            @error('status')
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
