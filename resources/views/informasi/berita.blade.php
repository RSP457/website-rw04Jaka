
@extends('layouts.app')

@section('content')

<style>
    /* =====================================
       HALAMAN BERITA RW 04
    ===================================== */

    .rw-news-page {
        background: #f5f7f6;
        min-height: 650px;
        padding-bottom: 80px;
    }

    .rw-news-container {
        max-width: 1320px;
        margin: auto;
        padding-left: 24px;
        padding-right: 24px;
    }

    /* HEADER */

    .rw-news-hero {
        background: #ffffff;
        padding: 65px 0 55px;
        border-bottom: 1px solid #eeeeee;
    }

    .rw-news-label {
        display: inline-block;
        background: #e8f5ed;
        color: #198754;
        padding: 7px 15px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .5px;
        margin-bottom: 15px;
    }

    .rw-news-hero h1 {
        color: #172b24;
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 13px;
        letter-spacing: -.8px;
    }

    .rw-news-hero p {
        color: #64748b;
        font-size: 16px;
        margin: 0;
        line-height: 1.8;
    }

    /* CONTENT */

    .rw-news-content {
        padding-top: 55px;
    }

    .rw-news-heading {
        margin-bottom: 30px;
    }

    .rw-news-heading h3 {
        font-size: 25px;
        color: #1f2937;
        font-weight: 750;
        margin-bottom: 7px;
    }

    .rw-news-heading p {
        color: #718096;
        font-size: 14px;
        margin: 0;
    }

    .rw-news-count {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: white;
        color: #198754;
        padding: 10px 16px;
        border-radius: 30px;
        border: 1px solid #e5e7eb;
        font-size: 13px;
        font-weight: 600;
    }

    /* SEARCH */

    .rw-news-search {
        background: #ffffff;
        border: 1px solid #e9eeeb;
        border-radius: 12px;
        padding: 14px;
        margin-bottom: 35px;
    }

    .rw-news-search .input-group {
        background: #f8faf9;
        border-radius: 8px;
        overflow: hidden;
    }

    .rw-news-search .input-group-text {
        background: #f8faf9;
        border: none;
        padding-left: 17px;
        color: #198754;
    }

    .rw-news-search input {
        background: #f8faf9;
        border: none;
        box-shadow: none;
        height: 48px;
        font-size: 14px;
    }

    .rw-news-search input:focus {
        background: #ffffff;
        box-shadow: none;
    }

    /* GRID */

    .rw-news-grid {
        row-gap: 32px;
    }

    /* CARD */

    .rw-news-card {
        background: #ffffff;
        border: 1px solid #e9eeeb;
        border-radius: 13px;
        height: 100%;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        text-decoration: none;
        color: inherit;
        transition: transform .25s ease,
                    box-shadow .25s ease;
    }

    .rw-news-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0,0,0,.09);
        color: inherit;
    }

    /* IMAGE */

    .rw-news-image-wrapper {
        width: 100%;
        height: 245px;
        overflow: hidden;
        background: #e9f2ed;
        position: relative;
    }

    .rw-news-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .4s ease;
    }

    .rw-news-card:hover .rw-news-image {
        transform: scale(1.045);
    }

    .rw-news-image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #198754;
        font-size: 55px;
    }

    /* CARD BODY */

    .rw-news-card-body {
        padding: 23px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .rw-news-date {
        color: #198754;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .rw-news-title {
        color: #1f2937;
        font-size: 19px;
        font-weight: 750;
        line-height: 1.5;
        margin-bottom: 12px;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;

        min-height: 57px;
    }

    .rw-news-description {
        color: #718096;
        font-size: 14px;
        line-height: 1.8;
        margin-bottom: 20px;

        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;

        min-height: 75px;
    }

    .rw-news-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-top: 1px solid #f0f2f0;
        padding-top: 16px;
        margin-top: auto;
    }

    .rw-news-read {
        color: #198754;
        font-size: 13px;
        font-weight: 750;
    }

    .rw-news-arrow {
        background: #e8f5ed;
        color: #198754;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: .2s;
    }

    .rw-news-card:hover .rw-news-arrow {
        background: #198754;
        color: #ffffff;
    }

    /* EMPTY STATE */

    .rw-news-empty {
        background: #ffffff;
        padding: 70px 25px;
        border-radius: 13px;
        text-align: center;
        border: 1px solid #e9eeeb;
    }

    .rw-news-empty i {
        color: #198754;
        font-size: 55px;
    }

    .rw-news-empty h4 {
        font-weight: 750;
        margin-top: 20px;
        color: #263238;
    }

    .rw-news-empty p {
        color: #718096;
        font-size: 14px;
    }

    /* PAGINATION */

    .rw-news-pagination {
        margin-top: 45px;
    }

    .rw-news-pagination .pagination {
        justify-content: center;
        gap: 5px;
    }

    .rw-news-pagination .page-link {
        border-radius: 7px;
        color: #198754;
        border: 1px solid #e5e7eb;
        padding: 9px 15px;
    }

    .rw-news-pagination .active .page-link {
        background: #198754;
        border-color: #198754;
        color: white;
    }

    /* RESPONSIVE */

    @media(max-width: 991px) {
        .rw-news-hero h1 {
            font-size: 35px;
        }

        .rw-news-image-wrapper {
            height: 220px;
        }
    }

    @media(max-width: 767px) {
        .rw-news-container {
            padding-left: 18px;
            padding-right: 18px;
        }

        .rw-news-hero {
            padding: 45px 0;
        }

        .rw-news-hero h1 {
            font-size: 30px;
        }

        .rw-news-content {
            padding-top: 35px;
        }

        .rw-news-heading h3 {
            font-size: 22px;
        }

        .rw-news-image-wrapper {
            height: 230px;
        }

        .rw-news-card-body {
            padding: 19px;
        }
    }
</style>


{{-- =====================================
     HEADER BERITA
===================================== --}}

<section class="rw-news-hero">

    <div class="rw-news-container">

        <span class="rw-news-label">
            <i class="bi bi-newspaper me-1"></i>
            INFORMASI RW 04
        </span>

        <h1>Berita & Informasi</h1>

        <p>
            Baca informasi dan berita terbaru seputar kegiatan,
            perkembangan, serta aktivitas masyarakat RW 04
            Jatinegara Kaum.
        </p>

    </div>

</section>


{{-- =====================================
     DAFTAR BERITA
===================================== --}}

<section class="rw-news-page">

    <div class="rw-news-container rw-news-content">


        {{-- JUDUL DAN JUMLAH BERITA --}}

        <div class="d-flex justify-content-between
                    align-items-center flex-wrap gap-3 rw-news-heading">

            <div>

                <h3>Informasi Terbaru</h3>

                <p>
                    Berita dan kegiatan masyarakat RW 04.
                </p>

            </div>

            <div class="rw-news-count">

                <i class="bi bi-newspaper"></i>

                Total {{ $beritas->total() }} berita

            </div>

        </div>


        {{-- PENCARIAN BERITA --}}

        <div class="rw-news-search">

            <div class="input-group">

                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>

                <input
                    type="search"
                    id="rwSearchBerita"
                    class="form-control"
                    placeholder="Cari judul atau informasi berita..."
                    autocomplete="off">

            </div>

        </div>


        {{-- GRID BERITA --}}

        <div class="row rw-news-grid justify-content-center"
             id="rwNewsGrid">


            @forelse($beritas as $berita)

                <div class="col-lg-4 col-md-6 rw-news-item"
                     data-title="{{ strtolower($berita->judul) }}"
                     data-description="{{ strtolower($berita->ringkasan ?? strip_tags($berita->isi)) }}">

                    <a href="{{ route('berita.show', $berita->slug) }}"
                       class="rw-news-card">


                        {{-- GAMBAR BERITA --}}

                        <div class="rw-news-image-wrapper">

                            @if($berita->gambar)

                                <img
                                    src="{{ asset('storage/' . $berita->gambar) }}"
                                    alt="{{ $berita->judul }}"
                                    class="rw-news-image"
                                    loading="lazy">

                            @else

                                <div class="rw-news-image-placeholder">

                                    <i class="bi bi-newspaper"></i>

                                </div>

                            @endif

                        </div>


                        {{-- KONTEN BERITA --}}

                        <div class="rw-news-card-body">


                            {{-- TANGGAL --}}

                            <div class="rw-news-date">

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


                            {{-- JUDUL --}}

                            <h5 class="rw-news-title">

                                {{ $berita->judul }}

                            </h5>


                            {{-- RINGKASAN --}}

                            <p class="rw-news-description">

                                {{ $berita->ringkasan
                                    ? \Illuminate\Support\Str::limit($berita->ringkasan, 150)
                                    : \Illuminate\Support\Str::limit(strip_tags($berita->isi), 150) }}

                            </p>


                            {{-- TOMBOL BACA --}}

                            <div class="rw-news-card-footer">

                                <span class="rw-news-read">

                                    Baca Selengkapnya

                                </span>

                                <span class="rw-news-arrow">

                                    <i class="bi bi-arrow-right"></i>

                                </span>

                            </div>

                        </div>

                    </a>

                </div>

            @empty

                {{-- BELUM ADA BERITA --}}

                <div class="col-12">

                    <div class="rw-news-empty">

                        <i class="bi bi-newspaper"></i>

                        <h4>Belum Ada Berita</h4>

                        <p>
                            Belum ada informasi yang diterbitkan
                            oleh admin RW 04.
                        </p>

                    </div>

                </div>

            @endforelse


            {{-- HASIL PENCARIAN KOSONG --}}

            <div class="col-12 d-none" id="rwSearchEmpty">

                <div class="rw-news-empty">

                    <i class="bi bi-search"></i>

                    <h4>Berita Tidak Ditemukan</h4>

                    <p>
                        Silakan coba kata kunci pencarian lainnya.
                    </p>

                </div>

            </div>


        </div>


        {{-- PAGINATION --}}

        @if($beritas->hasPages())

            <div class="rw-news-pagination" id="rwNewsPagination">

                {{ $beritas->links() }}

            </div>

        @endif


    </div>

</section>


{{-- =====================================
     PENCARIAN BERITA
===================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const search = document.getElementById('rwSearchBerita');

    const items = document.querySelectorAll('.rw-news-item');

    const empty = document.getElementById('rwSearchEmpty');

    const pagination = document.getElementById('rwNewsPagination');


    if (!search) return;


    search.addEventListener('input', function () {

        const keyword = this.value.toLowerCase().trim();

        let visible = 0;


        items.forEach(function (item) {

            const title = item.dataset.title || '';

            const description = item.dataset.description || '';

            const match = title.includes(keyword) ||
                          description.includes(keyword);


            item.classList.toggle('d-none', !match);

            if (match) {
                visible++;
            }

        });


        if (empty) {

            empty.classList.toggle(
                'd-none',
                visible > 0 || items.length === 0
            );

        }


        if (pagination) {

            pagination.classList.toggle(
                'd-none',
                keyword.length > 0
            );

        }

    });

});

</script>

@endsection
