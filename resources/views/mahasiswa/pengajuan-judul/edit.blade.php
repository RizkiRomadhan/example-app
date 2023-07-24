@extends('app')

@include('mahasiswa.header')

@section('content')
<div class="container-fluid">
  <div class="row">
    @include('mahasiswa.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
          <div class="col-12">
            <h3>Update Data Judul</h3>
          </div>

          <div class="col-12 mt-4">
            <form action="{{ route('pengajuan-judul.update', $judul->id) }}" method="POST">
              @csrf
              @method('PATCH')

              <div class="mb-3 row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        id="judul"
                        value="{{ old('judul') ? old('judul') : $judul->judul }}">

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
                    <select class="form-select @error('nim') is-invalid @enderror"
                        id="nim" name="nim">
                        <option value="">Pilih NIM Mahasiswa</option>
                        @foreach ($mahasiswa as $data)
                            @if ($judul->nim == $data->nim)
                                <option value="{{ $data->nim }}" selected>{{ $data->nim }}</option>
                                @else
                                <option value="{{ $data->nim }}">{{ $data->nim }}</option>
                                @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="id_dosbing1" class="col-sm-2 col-form-label">Dosen Pembimbing 1</label>
                <div class="col-sm-10">
                    <select class="form-select @error('id_dosbing1') is-invalid @enderror"
                        id="id_dosbing1" name="id_dosbing1">
                        <option value="">Pilih Dosen Pembimbing</option>
                        
                        @foreach ($dosen as $data)
                            <option value="{{ $data->nidn }}" @if ($judul->nidn_dosen_1 == $data->nidn) selected @endif>
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
                            <option value="{{ $data->nidn }}" @if ($judul->nidn_dosen_2 == $data->nidn) selected @endif>
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
