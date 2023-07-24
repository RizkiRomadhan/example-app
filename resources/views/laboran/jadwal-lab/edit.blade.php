@extends('app')

@include('laboran.header')

@section('content')

<div class="container-fluid">
  <div class="row">
    @include('laboran.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
          <div class="col-12">
            <h3>Update Jadwal Lab</h3>
          </div>

          <div class="col-12 mt-4">
            <form action="{{ route('jadwal-lab.update', $lab->id) }}" method="POST">
              @csrf
              @method('PATCH')

              <input type="hidden" name="nama_mahasiswa" value="">

            <div class="mb-3 row">
                <label for="nama_lab" class="col-sm-2 col-form-label">Nama Lab</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control @error('nama_lab') is-invalid @enderror" id="nama_lab"
                  name="nama_lab" value="{{ $lab->nama_lab }}">
                </div>
                @error('nama_lab')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-3 row">
                <label for="nama_laboran" class="col-sm-2 col-form-label">Nama Laboran</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control @error('nama_laboran') is-invalid @enderror" id="nama_laboran"
                  name="nama_laboran" value="{{ $lab->nama_laboran }}">
                </div>
                @error('nama_laboran')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-3 row">
                <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="waktu" class="form-control @error('waktu') is-invalid @enderror" id="waktu" value="{{ $lab->waktu }}">

                    @error('waktu')
                    <div class="text-danger mt-2">

                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

              <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select name="status" class="form-select" @error('status') is-invalid @enderror" id="status">
                      <option value="Digunakan" @if ($lab->status == 'Digunakan') selected @endif>Digunakan</option>
                      <option value="Kosong" @if ($lab->status == 'Kosong') selected @endif>Kosong</option>
                    </select>
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