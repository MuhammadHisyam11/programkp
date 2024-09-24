@extends('layouts.frontend')

@section('title', 'Daftar Bimbingan')

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
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-2 d-flex justify-content-center">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">Profile</div>
                        <div class="card-body">
                            <div class="container">
                                <h3 class="text-center">{{ Auth::user()->name }}</h3>
                                <p class="mt-3"><b>NPM : </b> {{ Auth::user()->npm }}</p>
                                <p><b>Email : </b> {{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">Tambah Data</div>
                        <div class="card-body">
                            <form action="{{ route('store.guidance') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="npm">Npm</label>
                                    <input type="number" id="npm" class="mt-2 form-control @error('npm') is-invalid @enderror" name="npm" value="{{ old('npm', Auth::user()->npm) }}" required autocomplete="npm">
                                    @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="keperluan">Keperluan</label>
                                    <input type="text" id="keperluan" class="mt-2 form-control @error('keperluan') is-invalid @enderror" name="keperluan" value="{{ old('keperluan') }}" required autocomplete="keperluan">
                                    @error('keperluan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="dosen">Nama Dosen</label>
                                    <select name="dosen_id" id="dosen" class="mt-2 form-control" name="dosen">
                                        @foreach ($dosen as $dsn)
                                        <option value="{{ $dsn->id }}">{{ $dsn->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="waktu">tanggal dan waktu</label>
                                    <input type="datetime-local" id="waktu" class="mt-2 form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{ old('waktu') }}" required autocomplete="waktu">
                                    @error('waktu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="mt-3 btn btn-primary float-right">Create</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection
