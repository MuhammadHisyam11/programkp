@extends('layouts.frontend')

@section('title', 'Buat Baru')

@section('custom-style')
<style>
    .move-vertical-animation{
        transition: 0.2s;
    }
    .move-vertical-animation:hover{
        transform: translateY(-10px)
    }
</style>

@endsection


@section('content')
<main>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <a href="{{ route('create.guidance') }}">
                    <div class="col">
                        <div class="card shadow-sm move-vertical-animation">
                            <div class="card-body">
                                <p class="card-text"><div class="d-inline-flex p-2 bg-primary text-white" style="border-radius: 5px"><i class="bi bi-plus-square me-2"></i>Daftar</div> <strong>BIMBINGAN</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('create.collection') }}">
                    <div class="col">
                        <div class="card shadow-sm move-vertical-animation">
                            <div class="card-body">
                                <p class="card-text"><div class="d-inline-flex p-2 bg-primary text-white" style="border-radius: 5px"><i class="bi bi-plus-square me-2"></i>Daftar</div> <strong>PENGUMPULAN TUGAS</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('active.guid') }}">
                    <div class="col">
                        <div class="card shadow-sm move-vertical-animation">
                            <div class="card-body">
                                <p class="card-text"><div class="d-inline-flex p-2 bg-danger text-white" style="border-radius: 5px"><i class="bi bi-exclamation-circle me-2"></i>Aktif</div> <strong>BIMBINGAN</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('active.coll') }}">
                    <div class="col">
                        <div class="card shadow-sm move-vertical-animation">
                            <div class="card-body">
                                <p class="card-text"><div class="d-inline-flex p-2 bg-danger text-white" style="border-radius: 5px"><i class="bi bi-exclamation-circle me-2"></i>Aktif</div> <strong>PENGUMPULAN TUGAS</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('history.guidance') }}">
                    <div class="col">
                        <div class="card shadow-sm move-vertical-animation">
                            <div class="card-body">
                                <p class="card-text"><div class="d-inline-flex p-2 bg-success text-white" style="border-radius: 5px"><i class="bi bi-clock-history mx-2"></i>History</div> <strong>BIMBINGAN</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('history.collection') }}">
                    <div class="col">
                        <div class="card shadow-sm move-vertical-animation">
                            <div class="card-body">
                                <p class="card-text"><div class="d-inline-flex p-2 bg-success text-white" style="border-radius: 5px"><i class="bi bi-clock-history mx-2"></i>History</div> <strong>PENGUMPULAN TUGAS</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
