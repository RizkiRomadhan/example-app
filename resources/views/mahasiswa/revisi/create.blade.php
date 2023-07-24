@extends('app')

@include('mahasiswa.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('mahasiswa.sidebar')
            <main style="display: flex; flex-direction: column; justify-content:space-between;"
                class="col-md-9 ms-sm-auto col-lg-10 px-md-4 border-bottom">
                <div class="pt-3 pb-2 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h3>List Bimbingan</h3>
                            <form style="margin-top: 2em;" action="{{ route('revisi.store') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('POST')
                                <div class="col-lg-10" style="margin-top: 20px; margin-left:20px">
                                    <div class="mb-3">
                                        <label for="text" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul">
                                    </div>
                                </div>
                                <div class="col-lg-10" style="margin-top: 20px; margin-left:20px">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" id="summernote" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-lg-10" style="margin-top: 20px; margin-left:20px">
                                    <label for="waktu" class="form-label">Waktu</label>
                                    <input type="datetime-local" class="form-control" id="waktu" name="waktu">
                                </div>
                                <div class="col-lg-10" style="margin-top: 20px; margin-left:20px">
                                    <label for="gambar">Upload Gambar</label> <br>
                                    <input id="gambar" name="gambar" type="file">
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
