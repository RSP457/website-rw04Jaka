@extends('admin.partials.app')

@section('title', 'Kas RW | Admin RW 04')

@section('content')

<style>
    .kas-toolbar {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 18px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .kas-filter {
        display: flex;
        align-items: flex-end;
        gap: 9px;
        flex-wrap: wrap;
    }

    .kas-filter-field {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .kas-filter-field label {
        color: #747b8b;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .4px;
        text-transform: uppercase;
    }

    .kas-filter input[type="month"] {
        height: 40px;
        padding: 0 12px;
        border: 1px solid #ddd;
        border-radius: 7px;
        background: #fff;
        color: #202536;
        font-family: inherit;
        font-size: 13px;
        outline: none;
    }

    .kas-filter input[type="month"]:focus {
        border-color: #a91634;
    }

    .kas-filter select#bulan {
        height: 40px;
        padding: 0 12px;
        border: 1px solid #a91634;
        border-radius: 7px;
        background: #fff;
        color: #a91634;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        outline: none;
        cursor: pointer;
        transition: .2s;
    }

    .kas-filter select#bulan:focus {
        border-color: #8d102b;
        box-shadow: 0 0 0 3px rgba(169, 22, 52, .12);
    }

    .kas-filter select#bulan option {
        background: #fff;
        color: #202536;
        font-weight: 400;
    }

    .kas-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        height: 40px;
        padding: 0 15px;
        border: 1px solid #a91634;
        border-radius: 7px;
        background: #a91634;
        color: #fff;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: .2s;
    }

    .kas-btn:hover {
        background: #8d102b;
        border-color: #8d102b;
        color: #fff;
    }

    .kas-btn-reset {
        background: #fff;
        border-color: #ddd;
        color: #a91634;
    }

    .kas-btn-reset:hover {
        background: #fff1f3;
        border-color: #e7aab6;
        color: #a91634;
    }

    .kas-number-masuk {
        color: #157347;
    }

    .kas-number-keluar {
        color: #b42336;
    }

    .kas-period {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 16px;
        padding: 8px 13px;
        border-radius: 30px;
        background: #fff1f3;
        color: #a91634;
        font-size: 12px;
        font-weight: 700;
    }

    .kas-table th,
    .kas-table td {
        vertical-align: middle;
    }

    .kas-table tbody tr:hover {
        background: #fffafb;
    }

    .kas-type {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .kas-type-masuk {
        background: #e9f7ef;
        color: #157347;
    }

    .kas-type-keluar {
        background: #fdecef;
        color: #b42336;
    }

    .kas-amount {
        font-weight: 800;
        white-space: nowrap;
    }

    .kas-amount-masuk {
        color: #157347;
    }

    .kas-amount-keluar {
        color: #b42336;
    }

    .kas-description {
        max-width: 280px;
        color: #747b8b;
        font-size: 12px;
        line-height: 1.6;
    }

    .kas-actions {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .kas-actions form {
        margin: 0;
    }

    .kas-actions .btn {
        padding: 8px 11px;
        font-size: 12px;
    }

    .kas-empty {
        padding: 50px 20px;
        text-align: center;
        color: #747b8b;
    }

    .kas-empty-icon {
        display: grid;
        place-items: center;
        width: 64px;
        height: 64px;
        margin: 0 auto 15px;
        border-radius: 50%;
        background: #fff1f3;
        color: #a91634;
        font-size: 27px;
    }

    .kas-empty h3 {
        margin: 0 0 7px;
        color: #202536;
        font-size: 18px;
    }

    .kas-empty p {
        margin: 0;
        font-size: 13px;
    }

    .kas-pagination {
        margin-top: 20px;
    }

    .kas-pagination .pagination {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 5px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .kas-pagination .page-link {
        display: block;
        min-width: 36px;
        padding: 8px 12px;
        border: 1px solid #e5e7eb;
        border-radius: 7px;
        background: #fff;
        color: #a91634;
        font-size: 13px;
        text-align: center;
        text-decoration: none;
    }

    .kas-pagination .page-link:hover {
        background: #fff1f3;
        border-color: #e7aab6;
        color: #a91634;
    }

    .kas-pagination .active .page-link {
        background: #a91634;
        border-color: #a91634;
        color: #fff;
    }

    .kas-pagination .disabled .page-link {
        background: #f7f7f9;
        color: #a6adbb;
    }

    @media (max-width: 700px) {
        .kas-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .kas-filter,
        .kas-filter-field {
            width: 100%;
        }

        .kas-filter input[type="month"],
        .kas-filter select#bulan {
            width: 100%;
        }
    }
</style>

<div class="topbar">
    <div>
        <h1>Kas RW</h1>
        <div class="muted">
            Kelola pemasukan, pengeluaran, dan saldo kas RW 04 Jatinegara Kaum.
        </div>
    </div>

    <div class="profile">
        Admin: <strong>{{ auth()->user()->name }}</strong>
    </div>
</div>

@if(session('success'))
    <div class="alert">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-error">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- RINGKASAN --}}
<div class="cards">

    <div class="card">
        <div class="muted">Saldo Kas</div>
        <div class="number">
            Rp {{ number_format($saldo, 0, ',', '.') }}
        </div>
        <div class="muted">Saldo dari data yang ditampilkan</div>
    </div>

    <div class="card">
        <div class="muted">Total Pemasukan</div>
        <div class="number kas-number-masuk">
            Rp {{ number_format($totalMasuk, 0, ',', '.') }}
        </div>
        <div class="muted">
            {{ $bulan ? 'Pemasukan kas pada periode ini' : 'Pemasukan kas keseluruhan' }}
        </div>
    </div>

    <div class="card">
        <div class="muted">Total Pengeluaran</div>
        <div class="number kas-number-keluar">
            Rp {{ number_format($totalKeluar, 0, ',', '.') }}
        </div>
        <div class="muted">
            {{ $bulan ? 'Pengeluaran kas pada periode ini' : 'Pengeluaran kas keseluruhan' }}
        </div>
    </div>

</div>

{{-- DAFTAR TRANSAKSI --}}
<section class="section">

    <div class="kas-toolbar">
        <div>
            <h2 style="margin-bottom: 6px;">Daftar Transaksi Kas</h2>
            <div class="muted">
                {{ $kas->total() }} transaksi ditemukan.
            </div>
        </div>

        <div style="display: flex; align-items: flex-end; gap: 9px; flex-wrap: wrap;">
            <form method="GET"
                  action="{{ route('admin.kas.index') }}"
                  class="kas-filter">

                <div class="kas-filter-field">
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

                <button type="submit" class="kas-btn">
                    Tampilkan
                </button>

                @if($bulan)
                    <a href="{{ route('admin.kas.index') }}"
                       class="kas-btn kas-btn-reset">
                        Semua
                    </a>
                @endif

            </form>

            <a href="{{ route('admin.kas.create') }}"
               class="btn btn-primary">
                + Tambah Transaksi
            </a>
        </div>
    </div>

    @if($bulan)
        <div class="kas-period">
            <span>&#128197;</span>
            Periode:
            {{ \Carbon\Carbon::createFromFormat('Y-m', $bulan)->locale('id')->translatedFormat('F Y') }}
        </div>
    @endif

    <div class="table-wrap">
        <table class="kas-table">
            <thead>
                <tr>
                    <th width="55">No</th>
                    <th width="130">Tanggal</th>
                    <th width="90">Tipe</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th width="150">Nominal</th>
                    <th width="130" class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($kas as $index => $transaksi)
                    <tr>
                        <td>
                            {{ $kas->firstItem() + $index }}
                        </td>

                        <td>
                            {{ $transaksi->tanggal->locale('id')->translatedFormat('d/m/Y') }}
                        </td>

                        <td>
                            <span class="kas-type kas-type-{{ $transaksi->tipe }}">
                                {{ $transaksi->tipe === 'masuk' ? 'Masuk' : 'Keluar' }}
                            </span>
                        </td>

                        <td>
                            <strong>{{ $transaksi->kategori }}</strong>
                        </td>

                        <td>
                            <div class="kas-description">
                                {{ $transaksi->keterangan ?: '-' }}
                            </div>
                        </td>

                        <td class="kas-amount kas-amount-{{ $transaksi->tipe }}">
                            {{ $transaksi->tipe === 'masuk' ? '+' : '-' }}
                            Rp {{ number_format((float) $transaksi->nominal, 0, ',', '.') }}
                        </td>

                        <td>
                            <div class="kas-actions">
                                <a href="{{ route('admin.kas.edit', $transaksi) }}"
                                   class="btn btn-edit"
                                   title="Edit transaksi">
                                    Edit
                                </a>

                                <form action="{{ route('admin.kas.destroy', $transaksi) }}"
                                      method="POST"
                                      onsubmit="return confirm('Apakah kamu yakin ingin menghapus transaksi ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-delete"
                                            title="Hapus transaksi">
                                        Hapus
                                    </button>

                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="kas-empty">
                                <div class="kas-empty-icon">
                                    &#128176;
                                </div>

                                <h3>Belum Ada Transaksi</h3>

                                <p>
                                    Silakan tambahkan transaksi kas pertama
                                    untuk periode ini.
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($kas->hasPages())
        <div class="kas-pagination">
            {{ $kas->links('pagination::bootstrap-5') }}
        </div>
    @endif

</section>

@endsection
