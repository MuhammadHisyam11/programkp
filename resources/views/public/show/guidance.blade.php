@extends('public.index')

@section('title', 'Home Page')

@section('dashboard')

<div class="container">
    <h3 class="card-title text-center mt-3"><strong>JADWAL BIMBINGAN</strong></h3>
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
                </tr>
            </thead>
            <tbody>
                @foreach ($guidance as $gdc)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $gdc->user->name }}</td>
                    <td>{{ $gdc->npm }}</td>
                    <td>{{ $gdc->keperluan }}</td>
                    <td>{{ \Carbon\Carbon::parse($gdc->waktu)->format('H:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($gdc->waktu)->format('l, d F Y') }}</td>
                    <td>{{ $gdc->dosen->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
