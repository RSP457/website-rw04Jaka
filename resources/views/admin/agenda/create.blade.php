@extends('admin.partials.app')
@section('title', 'Tambah Agenda | Admin RW 04')
@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Tambah Agenda</h1>
    <p class="text-sm text-slate-500">Masukkan informasi kegiatan RW 04.</p>
</div>
<form method="POST" action="{{ route('admin.agenda.store') }}" enctype="multipart/form-data" class="rounded-xl bg-white p-6 shadow-sm">
    @csrf @include('admin.agenda._form', ['submitLabel' => 'Simpan Agenda'])
</form>
@endsection
