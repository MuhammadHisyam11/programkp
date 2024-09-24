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
    <a href="{{ route('lesson') }}" class="bn17 ms-5 btn btn-light">Kembali</a>
    <div class="container d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Edit Data Perkuliahan</div>
            <div class="card-body">
                <form action="{{ route('admin.updatejadwal', $lesson->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="matkul">Matakuliah</label>
                        <input type="text" id="matkul" class="form-control @error('matkul') is-invalid @enderror" name="matkul" value="{{ $lesson->matkul }}" required autocomplete="matkul" autofocus>
                        @error('matkul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="day">Hari</label>
                        <select name="day_id" id="day" class="form-control" name="day">
                            @foreach ($hari as $day)
                            <option value="{{ $day->id }}" @if ($day->id == $day->day_id)
                                selected
                            @endif>{{ $day->hari }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jam">Pukul</label>
                        <input type="text" id="jam" class="form-control @error('jam') is-invalid @enderror" name="jam" value="{{ $lesson->jam }}" required autocomplete="jam">
                        @error('jam')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" id="kelas" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ $lesson->kelas }}" required autocomplete="kelas">
                        @error('kelas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dosen">Nama Dosen</label>
                        <select name="dosen_id" id="dosen" class="form-control" name="dosen">
                            @foreach ($dosen as $dsn)
                            <option value="{{ $dsn->id }}" @if ($dsn->id == $dsn->dosen_id)
                                selected
                            @endif>{{ $dsn->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="mt-3 btn btn-primary float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
