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
            <h3>Update Data Prodi</h3>
          </div>

          <div class="col-12 mt-4">
            <form action="{{ route('data-prodi.update', $prodi->id_prodi) }}" method="POST">
              @csrf
              @method('PATCH')

              <div class="mb-3 row">
                <label for="id_jurusan" class="col-sm-2 col-form-label">Nama Jurusan</label>
                <div class="col-sm-10">
                  <select class="form-select @error('id_jurusan') is-invalid @enderror" id="id_jurusan" name="id_jurusan">
                    <option>Pilihlah Nama Jurusan</option>
                    @foreach ($jurusan as $data)
                      <option value="{{ $data->id_jurusan }}" @if ($prodi->id_jurusan == $data->id_jurusan) selected @endif>{{ $data->nama_jurusan }}</option>
                    @endforeach
                  </select>
                </div>
                @error('id_jurusan')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror                
              </div>

              <div class="mb-3 row">
                <label for="id_prodi" class="col-sm-2 col-form-label">ID Prodi</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control @error('id_prodi') is-invalid @enderror" id="id_prodi" name="id_prodi" value="{{ $prodi->id_prodi }}">
                </div>
                @error('id_prodi')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="mb-3 row">
                <label for="nama_prodi" class="col-sm-2 col-form-label">Nama Prodi</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control @error('nama_prodi') is-invalid @enderror" id="nama_prodi" name="nama_prodi" value="{{ $prodi->nama_prodi }}">
                </div>
                @error('nama_prodi')
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
