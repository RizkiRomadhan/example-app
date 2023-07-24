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
                        <h3>Update Data Peminjaman Lab</h3>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_lab" class="col-sm-2 col-form-label">Nama Lab</label>
                          <div class="col-sm-10">
                            <input type="text" name="nama_lab" class="form-control" @error('nama_lab') is-invalid @enderror" id="nama_lab" value="{{ old('nama_lab') }}">
                            @error('nama_lab')
                              <div class="text-danger mt-2">
                                {{ $message }}
                              </div>                 
                            @enderror
                          </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="nama_laboran" class="col-sm-2 col-form-label">Nama Laboran</label>
                          <div class="col-sm-10">
                            <input type="text" name="nama_laboran" class="form-control" @error('nama_laboran') is-invalid @enderror" id="nama_laboran" value="{{ old('nama_laboran') }}">
                            @error('nama_laboran')
                              <div class="text-danger mt-2">
                                {{ $message }}
                              </div>                 
                            @enderror
                          </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                          <div class="col-sm-10">
                            <input type="text" name="keterangan" class="form-control" @error('keterangan') is-invalid @enderror" id="keterangan" value="{{ old('keterangan') }}">
                            @error('keterangan')
                              <div class="text-danger mt-2">
                                {{ $message }}
                              </div>                 
                            @enderror
                          </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" name="waktu" class="form-control @error('waktu') is-invalid @enderror" id="waktu" value="{{ old('waktu') }}">

                            @error('waktu')
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