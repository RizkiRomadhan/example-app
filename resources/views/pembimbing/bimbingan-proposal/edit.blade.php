@extends('app')

@include('pembimbing.header')

@section('content')
    <div class="container-fluid">
        <div class="row">
            ` @include('pembimbing.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="row">
                        <div class="col-12">
                            <h3>Update Data Bimbingan Proposal</h3>
                        </div>
                        <div class="col-12 mt-4">
                            <form action="{{ route('bimbingan-proposal.update', $bimbingan->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="mb-3 row">
                                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="judul"
                                            class="form-control @error('judul') is-invalid @enderror" id="judul"
                                            value="{{ old('judul') ? old('judul') : $bimbingan->judul }}">
                                        @error('judul')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="deskripsi"
                                            class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                            value="{{ old('deskripsi') ? old('deskripsi') : $bimbingan->deskripsi }}">
                                        @error('deskripsi')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="waktu"
                                            class="form-control @error('waktu') is-invalid @enderror" id="waktu"
                                            value="{{ old('waktu') ? old('waktu') : $bimbingan->waktu }}">
                                        @error('waktu')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="gambar"
                                            class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                                            value="{{ old('gambar') ? old('gambar') : $bimbingan->gambar }}">
                                        @error('gambar')
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
