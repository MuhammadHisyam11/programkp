@extends('layouts.frontend')

@section('title', 'Edit Dosen')

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
                        <form action="{{ route('dosen.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="mb-2">Nama</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
