@extends('layouts.frontend')

@section('title', 'Dashboard Admin')

@section('custom-style')
<style>
    .move-vertical-animation{
        transition: 0.2s;
    }
    .move-vertical-animation:hover{
        transform: translateY(-10px);
    }
</style>
@endsection

@section('content')
<main>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <a href="{{ route('user') }}">
                    <div class="col">
                        <div class="card shadow-sm move-vertical-animation">
                            <div class="card-body">
                                <p class="card-text"><div class="d-inline-flex p-2 bg-warning text-white" style="border-radius: 5px"><strong><i class="bi bi-database"></i> Data</div> USER</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.guidance') }}">
                    <div class="col">
                        <div class="card shadow-sm move-vertical-animation">
                            <div class="card-body">
                                <p class="card-text"><div class="d-inline-flex p-2 bg-warning text-white" style="border-radius: 5px"><strong><i class="bi bi-database"></i> Data</div> BIMBINGAN</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.collection') }}">
                    <div class="col">
                        <div class="card shadow-sm move-vertical-animation">
                            <div class="card-body">
                                <p class="card-text"><div class="d-inline-flex p-2 bg-warning text-white" style="border-radius: 5px"><strong><i class="bi bi-database"></i> Data</div> TUGAS </strong></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('dosen') }}">
                    <div class="col">
                        <div class="card shadow-sm move-vertical-animation">
                            <div class="card-body">
                                <p class="card-text"><div class="d-inline-flex p-2 bg-primary text-white" style="border-radius: 5px"><strong><i class="bi bi-plus-square me-2"></i>Tambah</div> DATA DOSEN</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('lesson') }}">
                    <div class="col">
                        <div class="card shadow-sm move-vertical-animation">
                            <div class="card-body">
                                <p class="card-text"><div class="d-inline-flex p-2 bg-primary text-white" style="border-radius: 5px"><strong> <i class="bi bi-plus-square me-2"></i>Tambah</div> MATAKULIAH</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
