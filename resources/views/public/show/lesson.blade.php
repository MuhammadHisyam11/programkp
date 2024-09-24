@extends('public.index')

@section('title', 'Jadwal Kuliah')

@section('dashboard')

<div class="container">
    <h3 class="card-title text-center mt-3"><strong>JADWAL KULIAH</strong></h3>
    <div style="overflow-x:auto;">
        <table id="example" class="table table-striped table-bordered text-center" border="1"  style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Dosen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lesson as $lsn)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $lsn->matkul }}</td>
                    <td>{{ $lsn->day->hari }}</td>
                    <td>{{ $lsn->jam }}</td>
                    <td>{{ $lsn->kelas }}</td>
                    <td>{{ $lsn->dosen->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
