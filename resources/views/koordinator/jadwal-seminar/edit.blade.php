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
            <h3>Update Data Seminar</h3>
          </div>

          <div class="col-12 mt-4">
            <form action="{{ route('jadwal-seminar.update', $seminar->id) }}" method="POST">
              @csrf
              @method('PATCH')

              <div class="mb-3 row">
                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control @error('nama_mahasiswa') is-invalid @enderror" id="nama_mahasiswa"
                  name="nama_mahasiswa" value="{{ $seminar->nama_mahasiswa }}">
                </div>
                @error('nama_mahasiswa')
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
                            <option value="{{ $data->nidn }}" @if ($seminar->nidn_dosen1 == $data->nidn) selected @endif>
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
                            <option value="{{ $data->nidn }}" @if ($seminar->nidn_dosen2 == $data->nidn) selected @endif>
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

            <div class="mb-3 row">
                <label for="id_penguji1" class="col-sm-2 col-form-label">Dosen Penguji 1</label>
                <div class="col-sm-10">
                    <select class="form-select @error('id_penguji1') is-invalid @enderror"
                        id="id_penguji1" name="id_penguji1">
                        <option value="">Pilih Dosen Pembimbing</option>

                        @foreach ($dosen as $data)
                            <option value="{{ $data->nidn }}" @if ($seminar->nidn_penguji1 == $data->nidn) selected @endif>
                                {{ $data->nama_dosen }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_penguji1')
                        <div class="text-danger mt-2">
                            Silahkan Pilih Dosen Pembimbing Anda Terlebih Dahulu
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="id_penguji2" class="col-sm-2 col-form-label">Dosen Penguji 2</label>
                <div class="col-sm-10">
                    <select class="form-select @error('id_penguji2') is-invalid @enderror"
                        id="id_penguji2" name="id_penguji2">
                        <option value="">Pilih Dosen Pembimbing</option>

                        @foreach ($dosen as $data)
                            <option value="{{ $data->nidn }}" @if ($seminar->nidn_penguji2 == $data->nidn) selected @endif>
                                {{ $data->nama_dosen }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_penguji2')
                        <div class="text-danger mt-2">
                            Silahkan Pilih Dosen Pembimbing Anda Terlebih Dahulu
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="waktu" class="form-control @error('waktu') is-invalid @enderror" id="waktu" value="{{ $seminar->waktu }}">

                    @error('waktu')
                    <div class="text-danger mt-2">

                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="ruangan" class="col-sm-2 col-form-label">Ruangan</label>
                  <div class="col-sm-10">
                    <input type="text" name="ruangan" class="form-control" @error('ruangan') is-invalid @enderror" id="ruangan" value="{{ $seminar->ruangan }}">
                    @error('ruangan')
                      <div class="text-danger mt-2">
                        {{ $message }}
                      </div>                 
                    @enderror
                  </div>
              </div>

              <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <input type="text" name="status" class="form-control" @error('status') is-invalid @enderror" id="status" value="{{ $seminar->status }}">
                    @error('status')
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