@extends('layouts.frontend')

@section('title', 'History Tugas')

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
    <a href="{{ route('home') }}" class="bn17 btn btn-light">Kembali</a>
    <h3 class="card-title text-center mt-3"><strong>PENGUMPULAN TUGAS</strong></h3>
    <div style="overflow-x:auto;">
        <table id="example" class="mt-3 table table-striped table-bordered text-center" border="1"  style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tugas</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Dosen</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $hst)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $hst->user->name }}</td>
                    <td>{{ $hst->lesson->matkul }}</td>
                    <td>{{ \Carbon\Carbon::parse($hst->waktu)->format('H:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($hst->waktu)->format('l, d F Y') }}</td>
                    <td>{{ $hst->dosen->name }}</td>
                    <td>{{ $hst->status }}</td>
                    <td>{{ $hst->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
