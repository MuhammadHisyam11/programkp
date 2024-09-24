@extends('layouts.frontend')

@section('title', 'Reset Password')

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

<div class="container">
    <a href="{{ route('home') }}" class="bn17 ms-5 btn btn-light">Kembali</a>
    <div class="container d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Update Password</div>
            <div class="card-body">
                <form action="{{ route('update.password') }}" method="POST">
                    @method("put")
                    @csrf
                    <div class="form-group mb-2">
                        <label for="current_password">Password Lama</label>
                        <input name="current_password" type="password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" autofocus>
                        @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password Baru</label>
                        <input name="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input name="password_confirmation" type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
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
@endsection
