@extends('app')

@include('koordinator.header')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('koordinator.sidebar')
        <main style="display: flex; flex-direction: column; justify-content:space-between;" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 border-bottom">
            <div class="pt-3 pb-2 mb-3">
                <div class="row">
                    <div class="col-12">
                        <h3>Buat Jadwal Seminar</h3>
                        <form style="margin-top: 2em;" action="{{ route('jadwal-seminar.store') }}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')

                            <div class="mb-3 row">
                                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                                  <div class="col-sm-10">
                                    <input type="text" name="nama_mahasiswa" class="form-control" @error('nama_mahasiswa') is-invalid @enderror" id="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}">
                                    @error('nama_mahasiswa')
                                      <div class="text-danger mt-2">
                                        {{ $message }}
                                      </div>                 
                                    @enderror
                                  </div>
                              </div>

                              <div class="mb-3 row">
                                <label for="id_dosbing1" class="col-sm-2 col-form-label">Dosen Pembimbing 1</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('id_dosbing1') is-invalid @enderror"
                                        id="id_dosbing1" name="id_dosbing1">
                                        <option value="">Pilih Dosen Pembimbing</option>
                                        @foreach ($dosen as $d)
                                            <option value="{{ $d->nidn }}">{{ $d->nama_dosen }}
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
                                        @foreach ($dosen as $d)
                                            <option value="{{ $d->nidn }}">{{ $d->nama_dosen }}
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
                                        @foreach ($dosen as $d)
                                            <option value="{{ $d->nidn }}">{{ $d->nama_dosen }}
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
                                        @foreach ($dosen as $d)
                                            <option value="{{ $d->nidn }}">{{ $d->nama_dosen }}
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
                                    <input type="datetime-local" name="waktu" class="form-control @error('waktu') is-invalid @enderror" id="waktu" value="{{ old('waktu') }}">
      
                                    @error('waktu')
                                    <div class="text-danger mt-2">
      
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="inputruangan" class="col-sm-2 col-form-label">Ruangan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ruangan" 
                                    class="form-control
                                        @error('ruangan') is-invalid @enderror" id="inputruangan">
                                    @error('ruangan')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="mb-3 row">
                                <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" name="status" 
                                    class="form-control
                                        @error('status') is-invalid @enderror" id="inputStatus">
                                    @error('status')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div style="display: flex; justify-content: flex-end; margin-bottom: 2em;">
                                <button class="btn btn-success" type="submit">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
@endsection
