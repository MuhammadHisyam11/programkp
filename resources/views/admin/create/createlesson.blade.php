@extends('layouts.frontend')

@section('title', 'Tambah Data Perkuliahan')

@section('button-back')
<style>
    .bn17 {
        font-family: lato,sans-serif;
        font-weight: bold;
        font-size: 13px;
        text-decoration: none;
        color: #000000;
        display: inline-block;
        padding: 10px 40px 10px 40px;
        position: relative;
        border: 3px solid #000000;
        border-radius: 20px;
    }
</style>
@endsection

@section('content')
<a href="{{ route('dosen') }}" class="bn17 ms-5 btn btn-light">Kembali</a>
<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-center">
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-header">Tambah Data</div>
                    <div class="card-body">
                        <form action="{{ route('admin.storejadwal') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="matkul">Matakuliah</label>
                                <input type="text" id="matkul" class="mt-2 form-control @error('matkul') is-invalid @enderror" name="matkul" value="{{ old('matkul') }}" required autocomplete="matkul" autofocus>
                                @error('matkul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="dosen">Hari</label>
                                <select name="day_id" id="day" class="form-control mt-2" name="day">
                                    @foreach ($hari as $day)
                                    <option value="{{ $day->id }}">{{ $day->hari }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="jam">Pukul</label>
                                <input type="text" id="jam" class="mt-2 form-control @error('jam') is-invalid @enderror" name="jam" value="{{ old('jam') }}" required autocomplete="jam">
                                @error('jam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="kelas">Kelas</label>
                                <input type="text" id="kelas" class="mt-2 form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}" required autocomplete="kelas">
                                @error('kelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="dosen">Nama Dosen</label>
                                <select name="dosen_id" id="dosen" class="form-control mt-2" name="dosen">
                                    @foreach ($dosen as $dsn)
                                    <option value="{{ $dsn->id }}">{{ $dsn->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="mt-3 btn btn-primary float-right">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
