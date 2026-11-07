
@extends('layouts.app')

@section('content')

<style>
    .article-header {
        background: linear-gradient(135deg, #123c35, #198754);
        padding: 65px 0;
        color: white;
    }

    .article-header h1 {
        font-size: 36px;
        line-height: 1.4;
        font-weight: 800;
        max-width: 900px;
    }

    .article-section {
        background: #f5f6f7;
        padding: 55px 0 75px;
    }

    .article-card {
        background: white;
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 4px 20px rgba(0,0,0,.04);
    }

    .article-image {
        width: 100%;
        max-height: 480px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .article-date {
        color: #198754;
        font-size: 14px;
        font-weight: 600;
        margin-top: 15px;
    }

    .article-summary {
        background: #f0f8f3;
        padding: 20px;
        border-left: 4px solid #198754;
        border-radius: 7px;
        margin-bottom: 30px;
        line-height: 1.8;
        color: #475569;
    }

    .article-body {
        font-size: 16px;
        line-height: 2;
        color: #374151;
        text-align: justify;
        overflow-wrap: anywhere;
    }

    .article-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #198754;
        font-weight: 700;
        text-decoration: none;
    }

    .article-back:hover {
        color: #126c42;
    }

    @media(max-width:768px) {
        .article-header {
            padding: 45px 0;
        }

        .article-header h1 {
            font-size: 26px;
        }

        .article-card {
            padding: 20px;
        }

        .article-body {
            font-size: 15px;
        }
    }
</style>

{{-- HEADER ARTIKEL --}}
<section class="article-header">

    <div class="container">

        <a href="{{ route('berita.index') }}"
           class="text-white text-decoration-none">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Berita

        </a>

        <div class="mt-4">

            <span class="badge bg-light text-success px-3 py-2">
                BERITA RW 04
            </span>

            <h1 class="mt-3 mb-0">
                {{ $berita->judul }}
            </h1>

            <div class="article-date text-white-50">

                <i class="bi bi-calendar3 me-1"></i>

                @if($berita->tanggal_publikasi)
                    {{ $berita->tanggal_publikasi
                        ->locale('id')
                        ->translatedFormat('d F Y') }}
                @else
                    {{ $berita->created_at
                        ->locale('id')
                        ->translatedFormat('d F Y') }}
                @endif

            </div>

        </div>

    </div>

</section>

{{-- ISI ARTIKEL --}}
<section class="article-section">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <article class="article-card">

                    {{-- GAMBAR --}}
                    @if($berita->gambar)

                        <img
                            src="{{ asset('storage/' . $berita->gambar) }}"
                            alt="{{ $berita->judul }}"
                            class="article-image">

                    @endif

                    {{-- RINGKASAN --}}
                    @if($berita->ringkasan)

                        <div class="article-summary">

                            <strong>Ringkasan Berita</strong>

                            <p class="mb-0 mt-2">
                                {{ $berita->ringkasan }}
                            </p>

                        </div>

                    @endif

                    {{-- ISI BERITA --}}
                    <div class="article-body">

                        {!! nl2br(e($berita->isi)) !!}

                    </div>

                    <hr class="my-4">

                    {{-- KEMBALI --}}
                    <a href="{{ route('berita.index') }}"
                       class="article-back">

                        <i class="bi bi-arrow-left"></i>
                        Kembali ke Semua Berita

                    </a>

                </article>

            </div>

        </div>

    </div>

</section>

@endsection
