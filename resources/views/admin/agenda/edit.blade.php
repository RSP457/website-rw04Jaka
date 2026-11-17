@extends('admin.partials.app')
@section('title', 'Edit Agenda | Admin RW 04')
@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Edit Agenda</h1>
    <p class="text-sm text-slate-500">Perbarui informasi kegiatan RW 04.</p>
</div>
<form method="POST" action="{{ route('admin.agenda.update', $agenda) }}" enctype="multipart/form-data" class="rounded-xl bg-white p-6 shadow-sm">
    @csrf @method('PUT')
    @include('admin.agenda._form', ['submitLabel' => 'Simpan Perubahan'])

    @if($agenda->lampirans->isNotEmpty())
        <div class="mt-6 border-t border-slate-100 pt-5">
            <h2 class="mb-3 font-semibold text-slate-800">Lampiran saat ini</h2>
            <ul class="space-y-2">
                @foreach($agenda->lampirans as $lampiran)
                    <li>
                        <a class="text-sm text-[#a91634] underline" href="{{ asset('storage/' . $lampiran->file_path) }}" target="_blank">{{ basename($lampiran->file_path) }}</a>
                        <span class="ml-2 text-xs text-slate-500">{{ ucfirst($lampiran->jenis) }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
@endsection
