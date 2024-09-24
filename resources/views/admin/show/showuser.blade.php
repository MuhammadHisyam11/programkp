@extends('layouts.frontend')

@section('title', 'Dashboard Admin')

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
@if (session('message'))
<div class="alert alert-success text-center">{{ session('message') }}</div>
@endif
<div class="container">
    <div class="container">
        <a href="{{ route('index') }}" class="bn17 btn btn-light">Kembali</a>
        <h3 class="card-title text-center mt-3"><strong>Data User</strong></h3>
        <div style="overflow-x:auto;">
            <table id="example" class="table table-striped table-bordered text-center" border="1"  style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Npm</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->npm }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form action="{{ route('admin.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"><i class="bi bi-trash3"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
