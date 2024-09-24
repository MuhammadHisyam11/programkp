@extends('layouts.frontend')

@section('title', 'Hapus Data Bimbingan')

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
<main>
    <a href="{{ route('home') }}" class="bn17 btn btn-light">Kembali</a>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-center">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">Hapus Data</div>
                        <div class="card-body">
                            <form action="{{ route('admin.destroyguid', $guidance->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="npm">Npm</label>
                                    <input type="number" id="npm" class="form-control @error('npm') is-invalid @enderror" name="npm" value="{{ $guidance->npm }}" required autocomplete="npm" autofocus>
                                    @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keperluan">Keperluan</label>
                                    <input type="text" id="keperluan" class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" value="{{ $guidance->keperluan }}" required autocomplete="keperluan">
                                    @error('keperluan')
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
                                    <div class="form-group">
                                        <label for="waktu">tanggal dan waktu</label>
                                        <input type="datetime-local" id="waktu" class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{ $guidance->waktu }}" required autocomplete="waktu">
                                        @error('waktu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ $guidance->keterangan }}" required autocomplete="keterangan">
                                        @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-primary float-right">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
