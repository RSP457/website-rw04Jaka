@extends('layouts.app')

@section('title', 'Kas RW | Portal RW 04 Jatinegara Kaum')

@section('content')

<style>
    /* =====================================
       HALAMAN KAS RW 04
    ===================================== */

    .rw-kas-page {
        --kas-primary: #b21835;
        --kas-primary-dark: #8f1229;
        --kas-soft: #fff1f3;
        --kas-text: #1b2432;
        --kas-muted: #718096;
        --kas-border: #e8ebf0;
        --kas-green: #157347;
        --kas-green-soft: #e9f7ef;
        --kas-red-soft: #fdecef;

        color: var(--kas-text);
        background: #f8f9fb;
    }

    .rw-kas-container {
        width: min(1240px, calc(100% - 48px));
        margin: auto;
    }

    /* HEADER */

    .rw-kas-hero {
        padding: 66px 0 58px;
        background:
            radial-gradient(circle at 90% 15%, #f8dfe4 0, transparent 32%),
            linear-gradient(120deg, #ffffff 45%, #fff8f9 100%);
        border-bottom: 1px solid var(--kas-border);
    }

    .rw-kas-badge {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 10px 15px;
        border-radius: 50px;
        background: var(--kas-soft);
        color: var(--kas-primary);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .7px;
        margin-bottom: 20px;
    }

    .rw-kas-hero h1 {
        font-size: clamp(32px, 4vw, 46px);
        line-height: 1.2;
        letter-spacing: -.9px;
        font-weight: 800;
        margin: 0 0 14px;
    }

    .rw-kas-hero p {
        max-width: 760px;
        margin: 0;
        color: var(--kas-muted);
        font-size: 16px;
        line-height: 1.9;
    }

    /* CONTENT */

    .rw-kas-content {
        padding: 46px 0 80px;
    }

    /* RINGKASAN */

    .rw-kas-summary {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
        margin-bottom: 26px;
    }

    .rw-kas-card {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        min-width: 0;
        padding: 24px;
        background: #fff;
        border: 1px solid var(--kas-border);
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(27, 36, 50, .04);
    }

    .rw-kas-card-icon {
        display: grid;
        place-items: center;
        width: 50px;
        height: 50px;
        flex-shrink: 0;
        border-radius: 14px;
        background: var(--kas-soft);
        color: var(--kas-primary);
        font-size: 23px;
    }

    .rw-kas-card--masuk .rw-kas-card-icon {
        background: var(--kas-green-soft);
        color: var(--kas-green);
    }

    .rw-kas-card--keluar .rw-kas-card-icon {
        background: var(--kas-red-soft);
        color: var(--kas-primary);
    }

    .rw-kas-card-label {
        margin-bottom: 7px;
        color: var(--kas-muted);
        font-size: 13px;
        font-weight: 600;
    }

    .rw-kas-card-value {
        margin: 0;
        font-size: clamp(20px, 2vw, 26px);
        font-weight: 800;
        letter-spacing: -.4px;
        line-height: 1.3;
        overflow-wrap: anywhere;
    }

    .rw-kas-card--masuk .rw-kas-card-value {
        color: var(--kas-green);
    }

    .rw-kas-card--keluar .rw-kas-card-value {
        color: var(--kas-primary);
    }

    .rw-kas-card-note {
        margin-top: 6px;
        color: var(--kas-muted);
        font-size: 12px;
        line-height: 1.6;
    }

    /* PANEL */

    .rw-kas-panel {
        padding: 26px;
        background: #fff;
        border: 1px solid var(--kas-border);
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(27, 36, 50, .04);
    }

    .rw-kas-panel-head {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 22px;
    }

    .rw-kas-panel-head h2 {
        margin: 0 0 7px;
        font-size: 22px;
        font-weight: 800;
        letter-spacing: -.3px;
    }

    .rw-kas-panel-head p {
        margin: 0;
        color: var(--kas-muted);
        font-size: 13px;
        line-height: 1.7;
    }

    /* FILTER */

    .rw-kas-filter {
        display: flex;
        align-items: flex-end;
        gap: 10px;
        flex-wrap: wrap;
    }

    .rw-kas-filter-field {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .rw-kas-filter-field label {
        color: var(--kas-muted);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .4px;
        text-transform: uppercase;
    }

    .rw-kas-filter input[type="month"] {
        height: 42px;
        padding: 0 12px;
        border: 1px solid var(--kas-border);
        border-radius: 9px;
        background: #f8fafb;
        color: var(--kas-text);
        font-family: inherit;
        font-size: 13px;
        outline: none;
    }

    .rw-kas-filter input[type="month"]:focus {
        border-color: #e7aab6;
        background: #fff;
    }

    .rw-kas-filter select#bulan {
        height: 42px;
        padding: 0 12px;
        border: 1px solid var(--kas-primary);
        border-radius: 9px;
        background: #fff;
        color: var(--kas-primary);
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        outline: none;
        cursor: pointer;
        transition: .2s;
    }

    .rw-kas-filter select#bulan:focus {
        border-color: var(--kas-primary-dark);
        box-shadow: 0 0 0 3px rgba(169, 22, 52, .12);
    }

    .rw-kas-filter select#bulan option {
        background: #fff;
        color: var(--kas-text);
        font-weight: 400;
    }

    .rw-kas-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        height: 42px;
        padding: 0 17px;
        border: 1px solid var(--kas-primary);
        border-radius: 9px;
        background: var(--kas-primary);
        color: #fff;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: .2s;
    }

    .rw-kas-btn:hover {
        background: var(--kas-primary-dark);
        border-color: var(--kas-primary-dark);
        color: #fff;
    }

    .rw-kas-btn-reset {
        background: #fff;
        border-color: var(--kas-border);
        color: var(--kas-primary);
    }

    .rw-kas-btn-reset:hover {
        background: var(--kas-soft);
        border-color: #e7aab6;
        color: var(--kas-primary);
    }

    .rw-kas-period {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 18px;
        padding: 8px 13px;
        border-radius: 30px;
        background: var(--kas-soft);
        color: var(--kas-primary);
        font-size: 12px;
        font-weight: 700;
    }

    /* TABEL */

    .rw-kas-table-wrap {
        overflow-x: auto;
        border: 1px solid var(--kas-border);
        border-radius: 12px;
    }

    .rw-kas-table {
        width: 100%;
        min-width: 720px;
        border-collapse: collapse;
        margin: 0;
    }

    .rw-kas-table thead th {
        padding: 14px 16px;
        background: #f7f8fa;
        border-bottom: 1px solid var(--kas-border);
        color: #475569;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .3px;
        text-align: left;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .rw-kas-table tbody td {
        padding: 15px 16px;
        border-bottom: 1px solid #f1f3f6;
        color: #374151;
        font-size: 13px;
        vertical-align: middle;
    }

    .rw-kas-table tbody tr:last-child td {
        border-bottom: none;
    }

    .rw-kas-table tbody tr:hover {
        background: #fffafb;
    }

    .rw-kas-date {
        display: block;
        color: var(--kas-text);
        font-weight: 700;
        white-space: nowrap;
    }

    .rw-kas-date small {
        display: block;
        margin-top: 3px;
        color: var(--kas-muted);
        font-size: 11px;
        font-weight: 400;
    }

    .rw-kas-type {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .rw-kas-type--masuk {
        background: var(--kas-green-soft);
        color: var(--kas-green);
    }

    .rw-kas-type--keluar {
        background: var(--kas-red-soft);
        color: var(--kas-primary);
    }

    .rw-kas-category {
        display: block;
        margin-top: 7px;
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
    }

    .rw-kas-description {
        max-width: 360px;
        color: #64748b;
        line-height: 1.7;
    }

    .rw-kas-amount {
        font-weight: 800;
        text-align: right;
        white-space: nowrap;
    }

    .rw-kas-amount--masuk {
        color: var(--kas-green);
    }

    .rw-kas-amount--keluar {
        color: var(--kas-primary);
    }

    /* KOSONG */

    .rw-kas-empty {
        padding: 60px 24px;
        text-align: center;
    }

    .rw-kas-empty-icon {
        display: grid;
        place-items: center;
        width: 72px;
        height: 72px;
        margin: 0 auto 18px;
        border-radius: 50%;
        background: var(--kas-soft);
        color: var(--kas-primary);
        font-size: 30px;
    }

    .rw-kas-empty h3 {
        margin: 0 0 8px;
        font-size: 19px;
        font-weight: 800;
    }

    .rw-kas-empty p {
        margin: 0;
        color: var(--kas-muted);
        font-size: 13px;
    }

    /* PAGINATION */

    .rw-kas-pagination {
        margin-top: 24px;
    }

    .rw-kas-pagination .pagination {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 6px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .rw-kas-pagination .page-link {
        display: block;
        min-width: 38px;
        padding: 9px 13px;
        border: 1px solid var(--kas-border);
        border-radius: 8px;
        background: #fff;
        color: var(--kas-primary);
        font-size: 13px;
        text-align: center;
        text-decoration: none;
    }

    .rw-kas-pagination .page-link:hover {
        border-color: #e7aab6;
        background: var(--kas-soft);
        color: var(--kas-primary);
    }

    .rw-kas-pagination .active .page-link {
        background: var(--kas-primary);
        border-color: var(--kas-primary);
        color: #fff;
    }

    .rw-kas-pagination .disabled .page-link {
        background: #f8f9fb;
        border-color: var(--kas-border);
        color: #a6adbb;
    }

    /* CATATAN */

    .rw-kas-note {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-top: 22px;
        padding: 16px 18px;
        border: 1px solid #f0dfe4;
        border-radius: 12px;
        background: #fff8f9;
        color: #7b6a70;
        font-size: 12px;
        line-height: 1.8;
    }

    .rw-kas-note i {
        color: var(--kas-primary);
        font-size: 17px;
        line-height: 1.4;
    }

    /* RESPONSIVE */

    @media (max-width: 991.98px) {
        .rw-kas-summary {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .rw-kas-card--saldo {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 767px) {
        .rw-kas-container {
            width: calc(100% - 32px);
        }

        .rw-kas-hero {
            padding: 48px 0 42px;
        }

        .rw-kas-hero p {
            font-size: 14px;
        }

        .rw-kas-content {
            padding: 32px 0 56px;
        }

        .rw-kas-panel {
            padding: 18px;
        }

        .rw-kas-panel-head {
            align-items: flex-start;
            flex-direction: column;
        }

        .rw-kas-filter {
            width: 100%;
        }

        .rw-kas-filter-field {
            flex: 1 1 100%;
        }

        .rw-kas-filter input[type="month"],
        .rw-kas-filter select#bulan,
        .rw-kas-filter .rw-kas-btn {
            width: 100%;
        }
    }

    @media (max-width: 575.98px) {
        .rw-kas-summary {
            grid-template-columns: minmax(0, 1fr);
            gap: 14px;
        }

        .rw-kas-card {
            padding: 18px;
        }

        .rw-kas-card-icon {
            width: 44px;
            height: 44px;
            font-size: 20px;
        }
    }
</style>

<div class="rw-kas-page">

    {{-- HEADER --}}
    <section class="rw-kas-hero">
        <div class="rw-kas-container">
            <span class="rw-kas-badge">
                <i class="bi bi-wallet2"></i>
                INFORMASI RW 04
            </span>

            <h1>Kas RW 04</h1>

            <p>
                Transparansi pengelolaan kas lingkungan RW 04 Jatinegara Kaum.
                Halaman ini menampilkan ringkasan pemasukan, pengeluaran,
                dan saldo kas yang dikelola oleh pengurus RW.
            </p>
        </div>
    </section>

    {{-- KONTEN --}}
    <section class="rw-kas-content">
        <div class="rw-kas-container">

            {{-- RINGKASAN KAS --}}
            <div class="rw-kas-summary">

                <div class="rw-kas-card rw-kas-card--saldo">
                    <div class="rw-kas-card-icon">
                        <i class="bi bi-wallet2"></i>
                    </div>

                    <div>
                        <div class="rw-kas-card-label">Saldo Kas</div>

                        <h2 class="rw-kas-card-value">
                            Rp {{ number_format($saldo, 0, ',', '.') }}
                        </h2>

                        <div class="rw-kas-card-note">
                            Saldo dari transaksi yang ditampilkan.
                        </div>
                    </div>
                </div>

                <div class="rw-kas-card rw-kas-card--masuk">
                    <div class="rw-kas-card-icon">
                        <i class="bi bi-arrow-down-circle"></i>
                    </div>

                    <div>
                        <div class="rw-kas-card-label">Total Pemasukan</div>

                        <h2 class="rw-kas-card-value">
                            Rp {{ number_format($totalMasuk, 0, ',', '.') }}
                        </h2>

                        <div class="rw-kas-card-note">
                            {{ $bulan ? 'Pemasukan kas pada periode ini.' : 'Pemasukan kas secara keseluruhan.' }}
                        </div>
                    </div>
                </div>

                <div class="rw-kas-card rw-kas-card--keluar">
                    <div class="rw-kas-card-icon">
                        <i class="bi bi-arrow-up-circle"></i>
                    </div>

                    <div>
                        <div class="rw-kas-card-label">Total Pengeluaran</div>

                        <h2 class="rw-kas-card-value">
                            Rp {{ number_format($totalKeluar, 0, ',', '.') }}
                        </h2>

                        <div class="rw-kas-card-note">
                            {{ $bulan ? 'Pengeluaran kas pada periode ini.' : 'Pengeluaran kas secara keseluruhan.' }}
                        </div>
                    </div>
                </div>

            </div>

            {{-- DAFTAR TRANSAKSI --}}
            <div class="rw-kas-panel">

                <div class="rw-kas-panel-head">
                    <div>
                        <h2>Riwayat Transaksi</h2>
                        <p>
                            {{ $kas->total() }} transaksi kas ditemukan.
                            Data ditampilkan dari transaksi terbaru.
                        </p>
                    </div>

                    {{-- FILTER BULAN --}}
                    <form action="{{ route('kas-rw') }}"
                          method="GET"
                          class="rw-kas-filter">

                        <div class="rw-kas-filter-field">
                            <select id="bulan" name="bulan">
                                <option value="">Semua bulan</option>
                                @foreach(\App\Models\Kas::query()
                                    ->selectRaw("DATE_FORMAT(tanggal, '%Y-%m') as periode")
                                    ->whereNotNull('tanggal')
                                    ->distinct()
                                    ->orderByDesc('periode')
                                    ->pluck('periode') as $periode)
                                    <option value="{{ $periode }}" @selected($bulan === $periode)>
                                        {{ \Carbon\Carbon::createFromFormat('Y-m', $periode)->locale('id')->translatedFormat('F Y') }}
                                    </option>
                                @endforeach
                            </select>      
                        </div>

                        <button type="submit" class="rw-kas-btn">
                            <i class="bi bi-funnel"></i>
                            Tampilkan
                        </button>

                        @if($bulan)
                            <a href="{{ route('kas-rw') }}"
                               class="rw-kas-btn rw-kas-btn-reset">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                Semua
                            </a>
                        @endif

                    </form>
                </div>

                @if($bulan)
                    <div class="rw-kas-period">
                        <i class="bi bi-calendar3"></i>
                        Periode:
                        {{ \Carbon\Carbon::createFromFormat('Y-m', $bulan)->locale('id')->translatedFormat('F Y') }}
                    </div>
                @endif

                <div class="rw-kas-table-wrap">
                    <table class="rw-kas-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Tipe</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th class="text-end">Nominal</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($kas as $transaksi)
                                <tr>
                                    <td>
                                        <span class="rw-kas-date">
                                            {{ $transaksi->tanggal->locale('id')->translatedFormat('d M Y') }}

                                            <small>
                                                {{ $transaksi->tanggal->locale('id')->translatedFormat('l') }}
                                            </small>
                                        </span>
                                    </td>

                                    <td>
                                        <span class="rw-kas-type rw-kas-type--{{ $transaksi->tipe }}">
                                            {{ $transaksi->tipe === 'masuk' ? 'Masuk' : 'Keluar' }}
                                        </span>
                                    </td>

                                    <td>
                                        <strong>{{ $transaksi->kategori }}</strong>
                                    </td>

                                    <td>
                                        <div class="rw-kas-description">
                                            {{ $transaksi->keterangan ?: '-' }}
                                        </div>
                                    </td>

                                    <td class="rw-kas-amount rw-kas-amount--{{ $transaksi->tipe }}">
                                        {{ $transaksi->tipe === 'masuk' ? '+' : '-' }}
                                        Rp {{ number_format((float) $transaksi->nominal, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="rw-kas-empty">
                                            <div class="rw-kas-empty-icon">
                                                <i class="bi bi-wallet2"></i>
                                            </div>

                                            <h3>Belum Ada Transaksi</h3>

                                            <p>
                                                Belum ada data kas yang ditampilkan
                                                untuk periode ini.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                @if($kas->hasPages())
                    <div class="rw-kas-pagination">
                        {{ $kas->links('pagination::bootstrap-5') }}
                    </div>
                @endif

            </div>

            <div class="rw-kas-note">
                <i class="bi bi-info-circle"></i>

                <span>
                    Informasi kas RW 04 disajikan untuk keterbukaan pengelolaan
                    keuangan lingkungan. Data diperbarui oleh pengurus RW
                    melalui panel administrasi.
                </span>
            </div>

        </div>
    </section>

</div>

@endsection
