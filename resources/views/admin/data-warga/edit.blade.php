@extends('admin.partials.app')

@section('title', 'Edit Data Warga | Admin RW 04')

@push('styles')
    @vite('resources/css/app.css')
@endpush

@section('content')

<div class="topbar">
    <div>
        <a href="{{ route('admin.data-warga.index') }}"
           class="mb-3 inline-flex items-center gap-1.5 text-[13px] text-[#747b8b] transition hover:text-[#a91634]">
            &#8592; Kembali ke Data Warga
        </a>

        <h1 class="font-bold">Edit Data Warga</h1>

        <div class="muted">
            Perbarui data kependudukan <strong>{{ $dataWarga->nama_lengkap }}</strong>.
        </div>
    </div>

    <div class="profile">
        Admin: <strong>{{ auth()->user()->name }}</strong>
    </div>
</div>

@include('admin.data-warga._form', ['dataWarga' => $dataWarga])

@endsection
