
@extends('admin.partials.app')

@section('content')

<style>
    .berita-header {
        margin-bottom: 25px;
    }

    .berita-header h3 {
        font-weight: 700;
        color: #263238;
    }

    .berita-stat {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        height: 100%;
        box-shadow: 0 3px 15px rgba(0,0,0,.04);
        border: 1px solid #f0f0f0;
    }

    .berita-stat .stat-label {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 12px;
    }

    .berita-stat h3 {
        font-weight: 800;
        margin: 0;
        color: #263238;
    }

    .berita-table-card {
        background: #fff;
        border-radius: 12px;
        padding: 22px;
        box-shadow: 0 3px 15px rgba(0,0,0,.04);
        border: 1px solid #f0f0f0;
    }

    .berita-table {
        vertical-align: middle;
        margin-bottom: 0;
    }

    .berita-table thead th {
        background: #f5f6f8;
        color: #374151;
        font-size: 13px;
        font-weight: 700;
        padding: 15px 12px;
        white-space: nowrap;
    }

    .berita-table tbody td {
        padding: 12px;
        font-size: 13px;
    }

    .berita-thumbnail {
        width: 85px;
        height: 65px;
        object-fit: cover;
        border-radius: 7px;
        border: 1px solid #eee;
    }

    .berita-title {
        font-weight: 600;
        color: #263238;
        margin-bottom: 5px;
    }

    .berita-summary {
        color: #6b7280;
        font-size: 12px;
        line-height: 1.5;
        max-width: 400px;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .status-terbit {
        background: #d1fae5;
        color: #047857;
    }

    .status-draft {
        background: #fef3c7;
        color: #92400e;
    }

    .btn-action {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        font-size: 15px;
        border: none;
        text-decoration: none;
        transition: .2s;
        cursor: pointer;
    }

    .btn-edit {
        background: #ffc107;
        color: #212529;
    }

    .btn-edit:hover {
        background: #e0a800;
        color: #212529;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background: #bb2d3b;
        color: white;
    }

    .btn-add-berita {
        background: #b01436;
        color: white;
        padding: 10px 18px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: .2s;
    }

    .btn-add-berita:hover {
        background: #900e2c;
        color: white;
    }

    .berita-empty {
        padding: 45px 20px;
        text-align: center;
        color: #6b7280;
    }

    .berita-empty i {
        font-size: 45px;
        color: #b01436;
    }

    .berita-pagination {
        margin-top: 20px;
    }

    .berita-pagination .pagination {
        justify-content: center;
    }

    .berita-pagination .page-link {
        color: #b01436;
    }

    .berita-pagination .active .page-link {
        background: #b01436;
        border-color: #b01436;
        color: white;
    }

    @media(max-width: 768px) {
        .berita-table-card {
            padding: 14px;
        }

        .berita-thumbnail {
            width: 65px;
            height: 55px;
        }
    }
</style>

@php
    $totalBerita = \App\Models\Berita::count();

    $totalTerbit = \App\Models\Berita::where('status', 'terbit')->count();

    $totalDraft = \App\Models\Berita::where('status', 'draft')->count();
@endphp

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="berita-header d-flex justify-content-between
                align-items-center flex-wrap gap-3">

        <div>
            <h3>Manajemen Berita</h3>

            <p class="text-muted mb-0">
                Kelola informasi dan berita kegiatan RW 04.
            </p>
        </div>

        <a href="{{ route('admin.berita.create') }}"
           class="btn-add-berita">

            <i class="bi bi-plus-circle"></i>
            Tambah Berita

        </a>

    </div>


    {{-- NOTIFIKASI --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show"
             role="alert">

            <i class="bi bi-exclamation-circle me-2"></i>

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- STATISTIK --}}
    <div class="row g-3 mb-4">

        <div class="col-lg-4 col-md-6">

            <div class="berita-stat">

                <div class="stat-label">
                    <i class="bi bi-newspaper me-2"></i>
                    Total Berita
                </div>

                <h3>{{ $totalBerita }}</h3>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="berita-stat">

                <div class="stat-label">
                    <i class="bi bi-check-circle me-2"></i>
                    Berita Terbit
                </div>

                <h3>{{ $totalTerbit }}</h3>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="berita-stat">

                <div class="stat-label">
                    <i class="bi bi-file-earmark me-2"></i>
                    Berita Draft
                </div>

                <h3>{{ $totalDraft }}</h3>

            </div>

        </div>

    </div>


    {{-- TABEL BERITA --}}
    <div class="berita-table-card">

        <div class="d-flex justify-content-between
                    align-items-center flex-wrap gap-2 mb-4">

            <div>
                <h5 class="fw-bold mb-1">
                    Daftar Berita RW 04
                </h5>

                <small class="text-muted">
                    Seluruh informasi yang dikelola oleh admin.
                </small>
            </div>

            <span class="badge bg-light text-dark p-2">
                {{ $beritas->total() }} Data Berita
            </span>

        </div>


        <div class="table-responsive">

            <table class="table table-hover berita-table">

                <thead>

                    <tr>
                        <th width="55">No</th>
                        <th width="110">Gambar</th>
                        <th>Judul Berita</th>
                        <th width="140">Tanggal Publikasi</th>
                        <th width="110">Status</th>
                        <th width="120" class="text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($beritas as $index => $berita)

                        <tr>

                            {{-- NOMOR --}}
                            <td>
                                {{ $beritas->firstItem() + $index }}
                            </td>


                            {{-- GAMBAR --}}
                            <td>

                                @if($berita->gambar)

                                    <img
                                        src="{{ asset('storage/' . $berita->gambar) }}"
                                        alt="{{ $berita->judul }}"
                                        class="berita-thumbnail">

                                @else

                                    <div class="berita-thumbnail
                                                bg-light d-flex
                                                align-items-center
                                                justify-content-center">

                                        <i class="bi bi-image
                                                  text-secondary fs-4"></i>

                                    </div>

                                @endif

                            </td>


                            {{-- JUDUL DAN RINGKASAN --}}
                            <td>

                                <div class="berita-title">
                                    {{ $berita->judul }}
                                </div>

                                <div class="berita-summary">

                                    {{ \Illuminate\Support\Str::limit(
                                        $berita->ringkasan ?? $berita->isi,
                                        100
                                    ) }}

                                </div>

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                @if($berita->tanggal_publikasi)

                                    {{ $berita->tanggal_publikasi
                                        ->format('d/m/Y') }}

                                @else

                                    <span class="text-muted">
                                        Belum ditentukan
                                    </span>

                                @endif

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if($berita->status === 'terbit')

                                    <span class="status-badge status-terbit">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Terbit
                                    </span>

                                @else

                                    <span class="status-badge status-draft">
                                        <i class="bi bi-file-earmark me-1"></i>
                                        Draft
                                    </span>

                                @endif

                            </td>


                            {{-- TOMBOL AKSI --}}
                            <td>

                                <div class="d-flex justify-content-center
                                            align-items-center gap-2">

                                    {{-- EDIT --}}
                                    <a href="{{ route(
                                            'admin.berita.edit',
                                            $berita->id
                                        ) }}"
                                       class="btn-action btn-edit"
                                       title="Edit Berita">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route(
                                            'admin.berita.destroy',
                                            $berita->id
                                        ) }}"
                                        method="POST"
                                        onsubmit="return confirm(
                                            'Apakah kamu yakin ingin menghapus berita ini?'
                                        )">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-action btn-delete"
                                                title="Hapus Berita">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">

                                <div class="berita-empty">

                                    <i class="bi bi-newspaper"></i>

                                    <h5 class="fw-bold mt-3">
                                        Belum Ada Berita
                                    </h5>

                                    <p class="mb-3">
                                        Silakan tambahkan berita pertama
                                        untuk masyarakat RW 04.
                                    </p>

                                    <a href="{{ route('admin.berita.create') }}"
                                       class="btn-add-berita">

                                        <i class="bi bi-plus-circle"></i>
                                        Tambah Berita

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- INFORMASI DATA --}}
        @if($beritas->total() > 0)

            <div class="d-flex justify-content-between
                        align-items-center flex-wrap gap-2 mt-3">

                <small class="text-muted">

                    Menampilkan {{ $beritas->firstItem() }}
                    sampai {{ $beritas->lastItem() }}
                    dari {{ $beritas->total() }} berita.

                </small>

            </div>

        @endif


        {{-- PAGINATION --}}
        <div class="berita-pagination">

            {{ $beritas->links() }}

        </div>

    </div>

</div>

@endsection
