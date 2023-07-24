@extends('app')

@include('mahasiswa.header')

@section('content')
<div class="container-fluid">
  <div class="row">
    @include('pembimbing.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
          <div class="col-12">
            <h3>Update Data Judul</h3>
          </div>

          <div class="col-12 mt-4">
            <form action="{{ route('acc-judul-proposal.update', $judul[0]->id) }}" method="POST">
              @csrf
              @method('PATCH')

              <div class="mb-3 row">
                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_mahasiswa" class="form-control @error('nama_mahasiswa') is-invalid @enderror" id="nama_mahasiswa" value="{{ old('nama_mahasiswa') ? old('nama_mahasiswa') : $judul[0]->nama_mahasiswa }}" disabled>
                    @error('nama_mahasiswa')
                    <div class="text-danger mt-2"> 
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
              <label for="nim" class="col-sm-2 col-form-label">Nim</label>
              <div class="col-sm-10">
                  <input
                    type="text"
                    name="nim"
                    class="form-control @error('nim') is-invalid @enderror"
                    id="nim"
                    value="{{ old('nim') ? old('nim') : $judul[0]->nim }}"
                    disabled>
                  @error('nim')
                  <div class="text-danger mt-2"> 
                      {{ $message }}
                  </div>
                  @enderror
              </div>
          </div>

          <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input
                  type="text"
                  name="judul"
                  class="form-control @error('judul') is-invalid @enderror"
                  id="judul"
                  value="{{ old('judul') ? old('judul') : $judul[0]->judul }}"
                  disabled>
                @error('judul')
                <div class="text-danger mt-2"> 
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
          <label for="status" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10 d-flex align-items-center">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="Diterima" id="flexRadioDefault1" checked>
              <label class="form-check-label" for="flexRadioDefault1">
                Diterima
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="Ditolak" id="flexRadioDefault2">
              <label class="form-check-label" for="flexRadioDefault2">
                Ditolak
              </label>
            </div>
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
