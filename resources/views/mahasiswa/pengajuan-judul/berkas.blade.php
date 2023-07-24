@extends('app')

@include('mahasiswa.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('mahasiswa.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class=" pt-3 pb-2 mb-3 border-bottom">

                    <div class="row">
                        <div class="col-12">
                            <h3>Upload Proposal</h3>

                            <form style="margin-top: 2em;" action="{{ route('pengajuan-judul.simpanBerkas', $id) }}"
                            method="POST" enctype="multipart/form-data">

                                @csrf
                                @method('POST')

                                <div class="mb-3 row">
                                    <label for="inputDeskripsi" class="col-sm-2 col-form-label">Upload Proposal</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="inputGroupFile01" name="berkas1">
                                        @error('berkas1')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputDeskripsi" class="col-sm-2 col-form-label">Upload Form Daftar</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="inputGroupFile01" name="berkas2">
                                        @error('berkas2')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputDeskripsi" class="col-sm-2 col-form-label">Upload Asistensi</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="inputGroupFile01" name="berkas3">
                                        @error('berkas3')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputDeskripsi" class="col-sm-2 col-form-label">Upload Keterangan KP</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="inputGroupFile01" name="berkas4">
                                        @error('berkas4')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div style="display: flex; justify-content: flex-end; margin-bottom: 2em;">
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
