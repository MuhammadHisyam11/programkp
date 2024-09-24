@extends('layouts.frontend')

@section('title', 'Data Aktif Tugas')

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
    <a href="{{ route('home') }}" class="bn17 btn btn-light">Kembali</a> <br>
    <div class="mt-2" >
        <small><strong>NOTE</strong> : Data Akan Terhapus Dalam 2 Jam Setelah Anda Mengumpulkan Tugas, Pastikan Anda Sudah Klik Selesai</small>
    </div>
    <h3 class="card-title text-center mt-3"><strong>PENGUMPULAN TUGAS</strong></h3>
    <div style="overflow-x:auto;">
        <table id="example" class="mt-3 table table-striped table-bordered text-center" border="1"  style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Tugas</th>
                    <th scope="col">Dosen</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collection as $cln)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $cln->user->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($cln->waktu)->format('H:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($cln->waktu)->format('l, d F Y') }}</td>
                    <td>{{ $cln->lesson->matkul }}</td>
                    <td>{{ $cln->dosen->name }}</td>
                    <td class="d-flex justify-content-start">
                        <a class="btn btn-primary" href="{{ route('edit.collection', $cln->id) }}"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('destroy.collection', $cln->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger mx-2" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"><i class="bi bi-trash3"></i></button>
                        </form>
                        <form action="{{ route('konfirmasi.historytugas', $cln->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Data Anda Sudah Benar?');"><i class="bi bi-check-circle"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
