@extends('public.index')

@section('title', 'Pengumpulan Tugas')

@section('dashboard')
<div class="container">
    <h3 class="card-title text-center mt-3"><strong>PENGUMPULAN TUGAS</strong></h3>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
