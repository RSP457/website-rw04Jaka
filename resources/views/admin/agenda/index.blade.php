@extends('admin.partials.app')
@section('title', 'Agenda Kegiatan | Admin RW 04')
@section('content')
<div class="mb-6 flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Agenda Kegiatan</h1>
        <p class="text-sm text-slate-500">Kelola jadwal dan informasi kegiatan RW 04.</p>
    </div>
    <a href="{{ route('admin.agenda.create') }}" class="rounded-lg bg-[#a91634] px-4 py-2.5 text-sm font-semibold text-white hover:bg-[#8d102b]">
        + Tambah Agenda
    </a>
</div>

@if(session('success'))
    <div class="mb-4 rounded-lg bg-green-50 p-3 text-sm text-green-800">{{ session('success') }}</div>
@endif

<form method="GET" class="mb-5 grid gap-3 rounded-xl bg-white p-4 shadow-sm md:grid-cols-[1fr_200px_200px_auto]">
    <input name="q" value="{{ request('q') }}" placeholder="Cari judul agenda" class="rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-[#a91634] focus:outline-none">
    <select name="kategori_id" class="rounded-lg border border-slate-200 px-3 py-2 text-sm">
        <option value="">Semua kategori</option>
        @foreach($kategoris as $kategori)
            <option value="{{ $kategori->id }}" @selected(request('kategori_id') == $kategori->id)>{{ $kategori->nama }}</option>
        @endforeach
    </select>
    <select name="status" class="rounded-lg border border-slate-200 px-3 py-2 text-sm">
        <option value="">Semua status</option>
        @foreach(\App\Models\Agenda::STATUS as $key => $label)
            <option value="{{ $key }}" @selected(request('status') === $key)>{{ $label }}</option>
        @endforeach
    </select>
    <button class="rounded-lg border border-[#a91634] px-4 py-2 text-sm font-semibold text-[#a91634] hover:bg-rose-50">
        Filter
    </button>
</form>

<div class="overflow-hidden rounded-xl bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[850px] text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                <tr>
                    <th class="px-5 py-3">Agenda</th>
                    <th class="px-5 py-3">Jadwal</th>
                    <th class="px-5 py-3">Kategori</th>
                    <th class="px-5 py-3">Status</th>
                    <th class="px-5 py-3">Visibilitas</th>
                    <th class="px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($agendas as $agenda)
                    <tr class="hover:bg-slate-50">
                        <td class="px-5 py-4">
                            <a class="font-semibold text-slate-800 hover:text-[#a91634]" href="{{ route('admin.agenda.show', $agenda) }}">{{ $agenda->judul }}</a>
                            <div class="mt-1 text-xs text-slate-500">{{ $agenda->lokasi }}</div>
                        </td>
                        <td class="px-5 py-4 text-slate-600">{{ $agenda->tanggal_mulai->locale('id')->translatedFormat('d M Y, H:i') }} WIB</td>
                        <td class="px-5 py-4 text-slate-600">{{ $agenda->kategori?->nama ?? '—' }}</td>
                        <td class="px-5 py-4">
                            <span class="rounded-full bg-rose-50 px-2.5 py-1 text-xs font-semibold text-[#a91634]">{{ \App\Models\Agenda::STATUS[$agenda->status] ?? $agenda->status }}</span>
                        </td>
                        <td class="px-5 py-4 text-slate-600">{{ ucfirst($agenda->visibilitas) }}</td>
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <a class="font-semibold text-[#a91634]" href="{{ route('admin.agenda.edit', $agenda) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.agenda.destroy', $agenda) }}" onsubmit="return confirm('Hapus agenda ini?')">
                                    @csrf @method('DELETE')
                                    <button class="font-semibold text-red-600">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-5 py-12 text-center text-slate-500">Belum ada agenda yang tercatat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="border-t border-slate-100 px-5 py-4">{{ $agendas->links() }}</div>
</div>
@endsection
