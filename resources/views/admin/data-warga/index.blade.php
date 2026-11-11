@extends('admin.partials.app')

@section('title', 'Data Warga | Admin RW 04')

@push('styles')
    @vite('resources/css/app.css')
@endpush

@section('content')

<div class="topbar">
    <div>
        <h1 class="font-bold">Data Warga</h1>
        <div class="muted">
            Kelola data kependudukan warga RW 04 Jatinegara Kaum.
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
        <ul class="mt-1 list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- RINGKASAN --}}
<div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

    <div class="rounded-xl bg-white p-5 shadow-[0_3px_15px_#20253608]">
        <div class="text-sm text-[#747b8b]">Total Warga</div>
        <div class="mt-2 text-3xl font-bold text-[#202536]">
            {{ number_format($statistik['total'], 0, ',', '.') }}
        </div>
        <div class="mt-1 text-xs text-[#747b8b]">Seluruh data warga terdaftar</div>
    </div>

    <div class="rounded-xl bg-white p-5 shadow-[0_3px_15px_#20253608]">
        <div class="text-sm text-[#747b8b]">Warga Aktif</div>
        <div class="mt-2 text-3xl font-bold text-[#157347]">
            {{ number_format($statistik['aktif'], 0, ',', '.') }}
        </div>
        <div class="mt-1 text-xs text-[#747b8b]">Berdomisili di RW 04</div>
    </div>

    <div class="rounded-xl bg-white p-5 shadow-[0_3px_15px_#20253608]">
        <div class="text-sm text-[#747b8b]">Pindah</div>
        <div class="mt-2 text-3xl font-bold text-[#a56800]">
            {{ number_format($statistik['pindah'], 0, ',', '.') }}
        </div>
        <div class="mt-1 text-xs text-[#747b8b]">Warga yang telah mutasi</div>
    </div>

    <div class="rounded-xl bg-white p-5 shadow-[0_3px_15px_#20253608]">
        <div class="text-sm text-[#747b8b]">Meninggal</div>
        <div class="mt-2 text-3xl font-bold text-[#b42336]">
            {{ number_format($statistik['meninggal'], 0, ',', '.') }}
        </div>
        <div class="mt-1 text-xs text-[#747b8b]">Data warga meninggal</div>
    </div>

</div>

{{-- DAFTAR WARGA --}}
<section class="section">

    <div class="mb-5 flex flex-wrap items-end justify-between gap-4">
        <div>
            <h2 class="font-bold mb-1.5">Daftar Warga</h2>
            <div class="muted">
                {{ $warga->total() }} data warga ditemukan.
            </div>
        </div>

        <div class="flex flex-wrap items-end gap-3">

            <form method="GET"
                  action="{{ route('admin.data-warga.index') }}"
                  class="flex flex-wrap items-end gap-3">

                <div class="flex flex-col gap-1.5">
                    <label for="q"
                           class="text-[11px] font-bold uppercase tracking-wide text-[#747b8b]">
                        Cari
                    </label>

                    <input type="search"
                           id="q"
                           name="q"
                           value="{{ request('q') }}"
                           placeholder="Nama, NIK, atau No. KK"
                           class="h-10 w-64 max-w-full rounded-lg border border-gray-300 bg-white px-3 text-sm text-[#202536] outline-none transition focus:border-[#a91634] focus:ring-2 focus:ring-[#a91634]/10">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="status"
                           class="text-[11px] font-bold uppercase tracking-wide text-[#747b8b]">
                        Status
                    </label>

                    <select id="status"
                            name="status"
                            class="h-10 rounded-lg border border-[#a91634] bg-white px-3 text-sm font-bold text-[#a91634] outline-none transition focus:border-[#8d102b] focus:ring-2 focus:ring-[#a91634]/10">
                        <option value="">Semua status</option>
                        <option value="aktif" @selected(request('status') === 'aktif')>Aktif</option>
                        <option value="pindah" @selected(request('status') === 'pindah')>Pindah</option>
                        <option value="meninggal" @selected(request('status') === 'meninggal')>Meninggal</option>
                    </select>
                </div>

                <button type="submit"
                        class="inline-flex h-10 items-center justify-center rounded-lg border border-[#a91634] bg-[#a91634] px-4 text-sm font-bold text-white transition hover:border-[#8d102b] hover:bg-[#8d102b]">
                    Tampilkan
                </button>

                @if(request()->filled('q') || request()->filled('status'))
                    <a href="{{ route('admin.data-warga.index') }}"
                       class="inline-flex h-10 items-center justify-center rounded-lg border border-gray-300 bg-white px-4 text-sm font-bold text-[#a91634] transition hover:border-[#e7aab6] hover:bg-[#fff1f3]">
                        Semua
                    </a>
                @endif

            </form>

            <a href="{{ route('admin.data-warga.create') }}"
               class="inline-flex h-10 items-center justify-center rounded-lg border border-[#a91634] bg-[#a91634] px-4 text-sm font-bold text-white transition hover:border-[#8d102b] hover:bg-[#8d102b]">
                + Tambah Warga
            </a>

        </div>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th width="55">No</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th width="80" class="text-center!">L/P</th>
                    <th width="90" class="text-center!">RT/RW</th>
                    <th width="110">Status</th>
                    <th width="130" class="text-center!">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($warga as $index => $item)
                    <tr class="transition hover:bg-[#fffafb]">
                        <td>
                            {{ $warga->firstItem() + $index }}
                        </td>

                        <td class="whitespace-nowrap font-mono text-xs text-[#4b5563]">
                            {{ $item->nik }}
                        </td>

                        <td>
                            <div class="font-bold text-[#202536]">
                                {{ $item->nama_lengkap }}
                            </div>
                            <div class="mt-0.5 text-xs text-[#747b8b]">
                                {{ $item->status_hubungan }} &middot; {{ $item->pekerjaan ?: 'Pekerjaan belum diisi' }}
                            </div>
                        </td>

                        <td class="text-center!">
                            {{ $item->jenis_kelamin }}
                        </td>

                        <td class="whitespace-nowrap text-center!">
                            {{ $item->rt }}/{{ $item->rw }}
                        </td>

                        <td>
                            @php
                                $statusClass = match ($item->status_warga) {
                                    'aktif'     => 'bg-[#e9f7ef] text-[#157347]',
                                    'pindah'    => 'bg-[#fff0d6] text-[#a56800]',
                                    'meninggal' => 'bg-[#fdecef] text-[#b42336]',
                                    default     => 'bg-gray-100 text-gray-600',
                                };
                            @endphp

                            <span class="inline-block whitespace-nowrap rounded-full px-2.5 py-1 text-[11px] font-extrabold {{ $statusClass }}">
                                {{ ucfirst($item->status_warga) }}
                            </span>
                        </td>

                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.data-warga.edit', $item) }}"
                                   class="btn btn-edit"
                                   title="Edit data warga">
                                    Edit
                                </a>

                                <form action="{{ route('admin.data-warga.destroy', $item) }}"
                                      method="POST"
                                      onsubmit="return confirm('Apakah kamu yakin ingin menghapus data warga ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-delete"
                                            title="Hapus data warga">
                                        Hapus
                                    </button>

                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="px-5 py-12 text-center!">
                                <div class="mx-auto mb-4 grid h-16 w-16 place-items-center rounded-full bg-[#fff1f3] text-2xl text-[#a91634]">
                                    &#128101;
                                </div>

                                <h3 class="mb-1.5 text-lg font-bold text-[#202536]">
                                    Belum Ada Data Warga
                                </h3>

                                <p class="text-sm text-[#747b8b]">
                                    Silakan tambahkan data warga pertama
                                    untuk mulai mengelola kependudukan RW 04.
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($warga->hasPages())
        <div class="mt-5">
            {{ $warga->links() }}
        </div>
    @endif

</section>

@endsection
