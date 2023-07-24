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
                        <h3>Penentuan Dosen Pembimbing</h3>
                        <form style="margin-top: 2em;" action="{{ route('penentuan-dosbing.store') }}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')

                            <div class="mb-3 row">
                                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('nama_mahasiswa') is-invalid @enderror"
                                        id="nama_mahasiswa" name="nama_mahasiswa">
                                        <option value="">Pilihlah Nama Mahasiswa</option>
                                        @foreach ($judul as $data)
                                            <option value="{{ $data->nim }}">{{ $data->nama_mahasiswa }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('nama_mahasiswa')
                                    <div class="text-danger mt-2">
                                        Silahkan Pilih Nama Mahasiswa Anda Terlebih Dahulu
                                    </div>
                                    @enderror
                                </div>
                              </div>

                        <div class="mb-3 row">
                            <label for="id_jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('id_jurusan') is-invalid @enderror"
                                    id="id_jurusan" name="id_jurusan">
                                    <option value="">Pilihlah Nama Jurusan</option>
                                    @foreach ($jurusan as $data)
                                        <option value="{{ $data->id_jurusan }}">{{ $data->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jurusan')
                                <div class="text-danger mt-2">
                                    Silahkan Pilih Jurusan Anda Terlebih Dahulu
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
