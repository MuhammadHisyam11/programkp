@extends('layouts.frontend')

@section('title', 'Data Mata Kuliah')

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
    <a href="{{ route('index') }}" class="bn17 btn btn-light">Kembali</a>
    <div style="overflow-x:auto;">
        <a class="btn btn-primary my-2" style="float: right" href="{{ route('admin.createjadwal') }}">Tambah Matkul</a>
        <table id="example" class="table table-striped table-bordered text-center" border="1"  style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Dosen</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lesson as $lsn)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $lsn->matkul }}</td>
                    <td>{{ $lsn->day->hari }}</td>
                    <td>{{ $lsn->jam }}</td>
                    <td>{{ $lsn->kelas }}</td>
                    <td>{{ $lsn->dosen->name }}</td>
                    <td class="d-flex justify-content-start">
                        <a class="btn btn-primary" href="{{ route('admin.editjadwal', $lsn->id) }}"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.destroyjadwal', $lsn->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger ms-2" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
