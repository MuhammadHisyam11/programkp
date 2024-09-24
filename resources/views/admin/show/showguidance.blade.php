@extends('layouts.frontend')

@section('title', 'Data Bimbingan')

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
    <h3 class="card-title text-center mt-3"><strong>Data Bimbingan</strong></h3>
    <div style="overflow-x:auto;">
        <table id="example" class="table table-striped table-bordered text-center" border="1"  style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Dosen</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guidance as $gdc)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $gdc->user->name }}</td>
                    <td>{{ $gdc->npm }}</td>
                    <td>{{ $gdc->keperluan }}</td>
                    <td>
                        @if($gdc->waktu > $time)
                        <p style="color: black;">{{ \Carbon\Carbon::parse($gdc->waktu)->format('H:i A') }}</p>
                        @else
                        <div class="d-block p-2 bg-danger text-white">{{ \Carbon\Carbon::parse($gdc->waktu)->format('H:i A') }}</div>
                        @endif
                    </td>
                    <td>
                        @if($gdc->waktu > $time)
                        <p style="color:black;">{{ \Carbon\Carbon::parse($gdc->waktu)->format('l, d F Y') }}</p>
                        @else
                        <div class="d-block p-2 bg-danger text-white">{{ \Carbon\Carbon::parse($gdc->waktu)->format('l, d F Y') }}</div>
                        @endif
                    </td>
                    <td>{{ $gdc->dosen->name }}</td>
                    <td class="d-flex justify-content-start">
                        <a href="{{ route('admin.deleteguidance', $gdc->id) }}">
                            <div class="btn btn-danger"><i class="bi bi-trash3"></i></div>
                        </a>
                        <form action="{{ route('admin.confirmguid', $gdc->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success ms-2" onclick="return confirm('Apakah Data Anda Yakin Data Sudah Benar?');"><i class="bi bi-check-circle"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
