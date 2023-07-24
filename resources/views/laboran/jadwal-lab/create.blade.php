@extends('app')

@include('laboran.header')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('laboran.sidebar')
        <main style="display: flex; flex-direction: column; justify-content:space-between;"
         class="col-md-9 ms-sm-auto col-lg-10 px-md-4 border-bottom">
            <div class="pt-3 pb-2 mb-3">
                <div class="row">
                    <div class="col-12">
                        <h3>Jadwal Lab</h3>
                        <form style="margin-top: 2em;" action="{{ route('jadwal-lab.store') }}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')

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
                              <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                  <select type="text" name="status" class="form-select" @error('status') is-invalid @enderror" id="status" >
                                    <option value="Digunakan">Digunakan</option>
                                    <option value="Kosong" selected>Kosong</option>
                                  </select>
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
