@extends('admin.partials.app')

@section('title', 'Edit Transaksi Kas | Admin RW 04')

@section('content')

<div class="topbar">
    <div>
        <a href="{{ route('admin.kas.index') }}" class="kas-back">
            &#8592; Kembali ke Kas RW
        </a>

        <h1>Edit Transaksi Kas</h1>

        <div class="muted">
            Perbarui data transaksi kas RW 04 Jatinegara Kaum.
        </div>
    </div>

    <div class="profile">
        Admin: <strong>{{ auth()->user()->name }}</strong>
    </div>
</div>

@include('admin.kas._form', ['kas' => $kas])

@endsection
