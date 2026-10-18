```blade
@extends('layouts.app')

@section('title', 'Agenda Kegiatan | RW 04')

@section('content')
<section class="py-5">
    <div class="container">
        <span class="badge rounded-pill mb-3"
              style="background:#fff1f3;color:#b21835;">
            INFORMASI WARGA
        </span>

        <h1 class="fw-bold mb-3">Agenda Kegiatan RW 04</h1>

        <p class="text-secondary mb-5">
            Informasi jadwal kegiatan dan aktivitas warga
            RW 04 Jatinegara Kaum.
        </p>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <h5 class="fw-bold">Belum Ada Agenda</h5>
                <p class="text-secondary mb-0">
                    Agenda kegiatan akan ditampilkan di halaman ini
                    setelah informasi resmi tersedia.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
```
