@extends('layouts.app')

@section('title', 'Agenda Kegiatan | RW 04')

@section('content')
<section class="bg-slate-50 py-14 sm:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 max-w-2xl">
            <span class="inline-flex rounded-full bg-rose-100 px-3 py-1 text-xs font-bold tracking-wide text-[#a91634]">INFORMASI WARGA</span>
            <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Agenda Kegiatan RW 04</h1>
            <p class="mt-3 text-base leading-7 text-slate-600">Informasi jadwal kegiatan dan aktivitas warga RW 04 Jatinegara Kaum.</p>
        </div>

        @if($agendas->isNotEmpty())
            <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                @foreach($agendas as $agenda)
                    <article class="flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                        <div class="flex flex-wrap items-center gap-2">
                            @if($agenda->kategori)<span class="rounded-full bg-rose-50 px-3 py-1 text-xs font-semibold text-[#a91634]">{{ $agenda->kategori->nama }}</span>@endif
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">{{ \App\Models\Agenda::STATUS[$agenda->status] }}</span>
                        </div>
                        <h2 class="mt-4 text-xl font-bold leading-snug text-slate-900">{{ $agenda->judul }}</h2>
                        <div class="mt-4 space-y-2 text-sm text-slate-600">
                            <p class="flex gap-2"><span class="font-semibold text-[#a91634]">Waktu</span><span>{{ $agenda->tanggal_mulai->locale('id')->translatedFormat('l, d F Y · H:i') }} WIB</span></p>
                            @if($agenda->tanggal_selesai)<p class="pl-12 text-xs text-slate-500">Selesai {{ $agenda->tanggal_selesai->locale('id')->translatedFormat('d F Y · H:i') }} WIB</p>@endif
                            <p class="flex gap-2"><span class="font-semibold text-[#a91634]">Lokasi</span><span>{{ $agenda->lokasi }}</span></p>
                            @if($agenda->penanggung_jawab)<p class="flex gap-2"><span class="font-semibold text-[#a91634]">PIC</span><span>{{ $agenda->penanggung_jawab }}</span></p>@endif
                        </div>
                        @if($agenda->deskripsi)<p class="mt-4 line-clamp-4 whitespace-pre-line text-sm leading-6 text-slate-600">{{ $agenda->deskripsi }}</p>@endif
                        @if($agenda->lampirans->isNotEmpty())
                            <div class="mt-auto border-t border-slate-100 pt-4 mt-5">
                                <p class="mb-2 text-xs font-bold uppercase tracking-wide text-slate-400">Lampiran</p>
                                <ul class="space-y-1">@foreach($agenda->lampirans as $lampiran)<li><a href="{{ asset('storage/' . $lampiran->file_path) }}" target="_blank" class="break-all text-sm font-medium text-[#a91634] underline decoration-rose-200 underline-offset-2 hover:decoration-[#a91634]">{{ basename($lampiran->file_path) }}</a></li>@endforeach</ul>
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>
            @if($agendas->hasPages())<div class="mt-8">{{ $agendas->links() }}</div>@endif
        @else
            <div class="rounded-2xl border border-slate-200 bg-white px-6 py-14 text-center shadow-sm">
                <div class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-rose-50 text-2xl text-[#a91634]">▦</div>
                <h2 class="mt-4 text-lg font-bold text-slate-900">Belum Ada Agenda</h2>
                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-600">Agenda kegiatan yang telah dijadwalkan untuk warga akan ditampilkan di sini.</p>
            </div>
        @endif
    </div>
</section>
@endsection
