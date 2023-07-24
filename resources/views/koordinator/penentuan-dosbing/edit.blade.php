@extends('app')

@include('koordinator.header')

@section('content')

<div class="container-fluid">
  <div class="row">
    @include('koordinator.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
          <div class="col-12">
            <h3>Update Penentuan Dosen Pembimbing</h3>
          </div>

          <div class="col-12 mt-4">
            <form action="{{ route('penentuan-dosbing.update', $judul->nim) }}" method="POST">
              @csrf
              @method('PATCH')

              <div class="mb-3 row">
                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control @error('nama_mahasiswa') is-invalid @enderror" id="nama_mahasiswa"
                  name="nama_mahasiswa" value="{{ $judul->nama_mahasiswa }}">
                </div>
                @error('nama_mahasiswa')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input
                  type="text"
                  name="nim"
                  class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim " value="{{ $judul->nim }}">
                </div>
                @error('nim')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

            <div class="mb-3 row">
                <label for="id_dosbing1" class="col-sm-2 col-form-label">Dosen Pembimbing 1</label>
                <div class="col-sm-10">
                    <select class="form-select @error('id_dosbing1') is-invalid @enderror"
                        id="id_dosbing1" name="id_dosbing1">
                        <option value="">Pilih Dosen Pembimbing</option>
                        
                        @foreach ($dosen as $data)
                            <option value="{{ $data->nidn }}" @if ($judul->nidn_dosen1 == $data->nidn) selected @endif>
                                {{ $data->nama_dosen }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_dosbing1')
                        <div class="text-danger mt-2">
                            Silahkan Pilih Dosen Pembimbing Anda Terlebih Dahulu
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="id_dosbing2" class="col-sm-2 col-form-label">Dosen Pembimbing 2</label>
                <div class="col-sm-10">
                    <select class="form-select @error('id_dosbing2') is-invalid @enderror"
                        id="id_dosbing2" name="id_dosbing2">
                        <option value="">Pilih Dosen Pembimbing</option>

                        @foreach ($dosen as $data)
                            <option value="{{ $data->nidn }}" @if ($judul->nidn_dosen2 == $data->nidn) selected @endif>
                                {{ $data->nama_dosen }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_dosbing2')
                        <div class="text-danger mt-2">
                            Silahkan Pilih Dosen Pembimbing Anda Terlebih Dahulu
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
  