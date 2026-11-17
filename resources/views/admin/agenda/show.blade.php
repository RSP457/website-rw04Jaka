@extends('admin.partials.app')
@section('title', $agenda->judul . ' | Agenda RW 04')
@section('content')
<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <div>
        <a href="{{ route('admin.agenda.index') }}" class="text-sm font-semibold text-[#a91634]">← Daftar agenda</a>
        <h1 class="mt-2 text-2xl font-bold text-slate-800">{{ $agenda->judul }}</h1>
    </div>
    <a href="{{ route('admin.agenda.edit', $agenda) }}" class="rounded-lg bg-[#a91634] px-4 py-2.5 text-sm font-semibold text-white">Edit Agenda</a>
</div>

<div class="rounded-xl bg-white p-6 shadow-sm">
    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <p class="text-xs font-semibold uppercase text-slate-400">Jadwal</p>
            <p class="mt-1 font-medium text-slate-800">{{ $agenda->tanggal_mulai->locale('id')->translatedFormat('l, d F Y · H:i') }} WIB@if($agenda->tanggal_selesai)<br>{{ $agenda->tanggal_selesai->locale('id')->translatedFormat('d F Y · H:i') }} WIB@endif</p>
        </div>
        <div>
            <p class="text-xs font-semibold uppercase text-slate-400">Lokasi</p>
            <p class="mt-1 font-medium text-slate-800">{{ $agenda->lokasi }}</p>
        </div>
        <div>
            <p class="text-xs font-semibold uppercase text-slate-400">Kategori</p>
            <p class="mt-1 font-medium text-slate-800">{{ $agenda->kategori?->nama ?? '—' }}</p>
        </div>
        <div>
            <p class="text-xs font-semibold uppercase text-slate-400">Status dan visibilitas</p>
            <p class="mt-1 font-medium text-slate-800">{{ \App\Models\Agenda::STATUS[$agenda->status] }}</p>
        </div>
        <div>
            <p class="text-xs font-semibold uppercase text-slate-400">Penanggung jawab</p>
            <p class="mt-1 font-medium text-slate-800">{{ $agenda->penanggung_jawab ?: '—' }}</p>
        </div>
        <div>
            <p class="text-xs font-semibold uppercase text-slate-400">Dibuat oleh</p>
            <p class="mt-1 font-medium text-slate-800">{{ $agenda->pembuat?->name ?? '—' }}</p>
        </div>
    </div>

    <div class="mt-7 border-t border-slate-100 pt-6">
        <h2 class="font-semibold text-slate-800">Deskripsi</h2>
        <p class="mt-2 whitespace-pre-line text-sm leading-7 text-slate-600">{{ $agenda->deskripsi ?: 'Tidak ada deskripsi.' }}</p>
    </div>

    @if($agenda->lampirans->isNotEmpty())
        <div class="mt-7 border-t border-slate-100 pt-6">
            <h2 class="font-semibold text-slate-800">Lampiran</h2>
            <ul class="mt-3 space-y-2">
                @foreach($agenda->lampirans as $lampiran)
                    <li>
                        <a class="text-sm text-[#a91634] underline" href="{{ asset('storage/' . $lampiran->file_path) }}" target="_blank">{{ basename($lampiran->file_path) }}</a>
                        <span class="text-xs text-slate-500">{{ ucfirst($lampiran->jenis) }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
