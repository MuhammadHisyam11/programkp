@extends('layouts.frontend')

@section('title', 'Data Tugas')

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
    <h3 class="card-title text-center mt-3"><strong>Data Tugas</strong></h3>
    <div style="overflow-x:auto;">
        <table id="example" class="table table-striped table-bordered text-center" border="1"  style="width:100%">
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
                    <td>
                        @if($cln->waktu > $coll)
                        <p style="color: black;">{{ \Carbon\Carbon::parse($cln->waktu)->format('H:i A') }}</p>
                        @else
                        <div class="d-block p-2 bg-danger text-white">{{ \Carbon\Carbon::parse($cln->waktu)->format('H:i A') }}</div>
                        @endif
                    </td>
                    <td>
                        @if($cln->waktu > $coll)
                        <p style="color:black;">{{ \Carbon\Carbon::parse($cln->waktu)->format('l, d F Y') }}</p>
                        @else
                        <div class="d-block p-2 bg-danger text-white">{{ \Carbon\Carbon::parse($cln->waktu)->format('l, d F Y') }}</div>
                        @endif
                    </td>
                    <td>{{ $cln->lesson->matkul }}</td>
                    <td>{{ $cln->dosen->name }}</td>
                    <td class="d-flex justify-content-start">
                        <a href="{{ route('admin.deletecollection', $cln->id) }}">
                            <div class="btn btn-danger"><i class="bi bi-trash3"></i></div>
                        </a>
                        <form action="{{ route('admin.confirmcoll', $cln->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success ms-2" onclick="return confirm('Apakah Anda Yakin Data Sudah Benar?');"><i class="bi bi-check-circle"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
