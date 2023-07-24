@extends('app')

@include('admin.header')

@section('content')
<div class="container-fluid">
  <div class="row">
    @include('admin.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
          <div class="col-12">
            <h3>Update Data Mahasiswa</h3>
          </div>
          <div class="col-12 mt-4">
            <form action="{{ route('data-mahasiswa.update', $mahasiswa->nim) }}" method="POST">
              @csrf
              @method('PATCH')

              <div class="mb-3 row">
                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama mahasiswa</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                  id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa}}">
                </div>
                @error('nama_mahasiswa')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ $mahasiswa->nim }}">
                </div>
                @error('nim')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="mb-3 row">
                <label for="inputjurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <select class="form-select @error('id_jurusan') is-invalid @enderror"
                        id="jurusan" name="id_jurusan">
                        <option value="">Pilihlah Nama Jurusan</option>
                        @foreach ($jurusan as $data)
                            <option value="{{ $data->id_jurusan }}">{{ $data->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_jurusan')
                    <div class="text-danger mt-2">
                        Silahkan Pilih Jurusan Anda Terlebih Dahulu
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputprodi" class="col-sm-2 col-form-label">Program Studi</label>
                <div class="col-sm-10">
                    <select class="form-select @error('id_prodi') is-invalid @enderror"
                        id="prodi" name="id_prodi">
                        <option value="">Pilihlah Nama Prodi</option>
                        @foreach ($prodi as $data)
                            <option value="{{ $data->id_prodi }}">{{ $data->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_prodi')
                    <div class="text-danger mt-2">
                        Silahkan Pilih Jurusan Anda Terlebih Dahulu
                    </div>
                    @enderror
                </div>
            </div>

              <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $mahasiswa->email}}">
                </div>
                @error('email')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="mb-3 row">
                <label for="nomor_ponsel" class="col-sm-2 col-form-label">Nomor Ponsel</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control @error('nomor_ponsel') is-invalid @enderror"
                  id="nomor_ponsel" name="nomor_ponsel" value="{{ $mahasiswa->nomor_ponsel}}">
                </div>
                @error('nomor_ponsel')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ $mahasiswa->status}}">
                </div>
                @error('status')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
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
