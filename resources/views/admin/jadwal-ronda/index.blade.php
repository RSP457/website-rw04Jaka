@extends('admin.partials.app')

@section('title', 'Jadwal Ronda | Admin RW 04')

@section('content')

<div class="topbar">
    <div>
        <h1>Jadwal Ronda</h1>
        <div class="muted">
            Pengelolaan jadwal keamanan wilayah RW 04 Jatinegara Kaum
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

{{-- STATISTIK --}}

<div class="cards">

    <div class="card">
        <div class="muted">Total Jadwal</div>
        <div class="number">{{ $totalJadwal }}</div>
        <div class="muted">Jadwal ronda tersimpan</div>
    </div>

    <div class="card">
        <div class="muted">Total RT Bertugas</div>
        <div class="number">{{ $totalRT }}/11</div>
        <div class="muted">RT yang memiliki jadwal</div>
    </div>

    <div class="card">
        <div class="muted">Dokumentasi</div>
        <div class="number">{{ $totalDokumentasi }}</div>
        <div class="muted">Foto kegiatan tersimpan</div>
    </div>

</div>

{{-- GENERATE OTOMATIS --}}

<section class="section">

    <h2>⟳ Generate Jadwal Ronda Otomatis</h2>

    <p class="muted">
        Sistem akan membuat jadwal Jumat dan Sabtu malam
        secara bergantian untuk 11 RT.
    </p>

    <form method="POST"
          action="{{ route('admin.jadwal-ronda.generate') }}">

        @csrf

        <div class="form-grid">

            <div>
                <label>Tanggal Mulai</label>
                <input
                    type="date"
                    name="tanggal_mulai"
                    class="form-control"
                    value="{{ old('tanggal_mulai', now()->toDateString()) }}"
                    required
                >
            </div>

            <div>
                <label>Jumlah Minggu</label>
                <input
                    type="number"
                    name="jumlah_minggu"
                    class="form-control"
                    min="1"
                    max="52"
                    value="{{ old('jumlah_minggu', 11) }}"
                    required
                >
            </div>

        </div>

        <button type="submit"
                class="btn btn-primary"
                onclick="return confirm('Generate jadwal rolling untuk 11 RT?')">
            Generate Jadwal Otomatis
        </button>

    </form>

</section>

{{-- TAMBAH JADWAL MANUAL --}}

<section class="section">

    <h2>+ Tambah Jadwal Ronda</h2>

    <form method="POST"
          action="{{ route('admin.jadwal-ronda.store') }}">

        @csrf

        <div class="form-grid">

            <div>
                <label>Tanggal Ronda</label>
                <input type="date"
                       name="tanggal"
                       class="form-control"
                       required>
            </div>

            <div>
                <label>RT Bertugas</label>
                <select name="rt" class="form-control" required>
                    <option value="">Pilih RT</option>

                    @for($i = 1; $i <= 11; $i++)
                        <option value="RT {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                            RT {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                        </option>
                    @endfor

                </select>
            </div>

            <div>
                <label>Nama Petugas</label>
                <input type="text"
                       name="petugas"
                       class="form-control"
                       placeholder="Nama petugas ronda">
            </div>

            <div>
                <label>Jam Mulai</label>
                <input type="time"
                       name="jam_mulai"
                       class="form-control"
                       value="22:00"
                       required>
            </div>

            <div>
                <label>Jam Selesai</label>
                <input type="time"
                       name="jam_selesai"
                       class="form-control"
                       value="04:00"
                       required>
            </div>

            <div>
                <label>Keterangan</label>
                <input type="text"
                       name="keterangan"
                       class="form-control"
                       placeholder="Keterangan kegiatan">
            </div>

        </div>

        <button class="btn btn-primary" type="submit">
            Simpan Jadwal
        </button>

    </form>

</section>

{{-- TABEL JADWAL --}}

<section class="section">

    <h2>Daftar Jadwal Ronda</h2>

    <p class="muted">
        Semua jadwal ronda yang telah dibuat.
    </p>

    <div class="table-wrap">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>RT</th>
                    <th>Petugas</th>
                    <th>Jam</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($jadwals as $index => $jadwal)

                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>
                            {{ $jadwal->tanggal->format('d-m-Y') }}
                        </td>

                        <td>{{ $jadwal->hari }}</td>

                        <td>
                            <strong>{{ $jadwal->rt }}</strong>
                        </td>

                        <td>{{ $jadwal->petugas ?: '-' }}</td>

                        <td>
                            {{ substr($jadwal->jam_mulai, 0, 5) }}
                            -
                            {{ substr($jadwal->jam_selesai, 0, 5) }}
                        </td>

                        <td>{{ $jadwal->keterangan ?: '-' }}</td>

                        <td>
                            <a href="{{ route('admin.jadwal-ronda.edit', $jadwal->id) }}"
                               class="btn btn-edit">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('admin.jadwal-ronda.destroy', $jadwal->id) }}"
                                  style="display:inline"
                                  onsubmit="return confirm('Hapus jadwal ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-delete">
                                    Hapus
                                </button>

                            </form>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="8" style="text-align:center;padding:30px">
                            Belum ada jadwal ronda.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</section>

{{-- UPLOAD DOKUMENTASI --}}

<section class="section">

    <h2>+ Upload Dokumentasi Kegiatan</h2>

    <p class="muted">
        Upload foto petugas keamanan, kegiatan ronda, patroli,
        dan aktivitas pos keamanan RW 04.
    </p>

    <form method="POST"
          action="{{ route('admin.dokumentasi-ronda.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="form-grid">

            <div>
                <label>Judul Dokumentasi</label>
                <input type="text"
                       name="judul"
                       class="form-control"
                       placeholder="Contoh: Kegiatan Ronda Malam"
                       required>
            </div>

            <div>
                <label>Kategori Foto</label>
                <select name="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option>Petugas Keamanan</option>
                    <option>Kegiatan Ronda</option>
                    <option>Patroli</option>
                    <option>Pos Ronda</option>
                </select>
            </div>

            <div>
                <label>Tanggal Kegiatan</label>
                <input type="date"
                       name="tanggal"
                       class="form-control">
            </div>

            <div>
                <label>Foto Dokumentasi</label>
                <input type="file"
                       name="foto"
                       class="form-control"
                       accept="image/jpeg,image/png,image/webp"
                       required>
            </div>

        </div>

        <label>Keterangan</label>

        <textarea name="keterangan"
                  class="form-control"
                  rows="3"
                  placeholder="Keterangan kegiatan..."></textarea>

        <button type="submit" class="btn btn-primary">
            Upload Dokumentasi
        </button>

    </form>

</section>

{{-- GALERI DOKUMENTASI --}}

<section class="section">

    <h2>Galeri Dokumentasi</h2>

    <p class="muted">
        Dokumentasi kegiatan keamanan wilayah RW 04.
    </p>

    <div class="gallery">

        @forelse($dokumentasis as $item)

            <div class="gallery-card">

                <img src="{{ asset('storage/' . $item->foto) }}"
                     alt="{{ $item->judul }}">

                <h3>{{ $item->judul }}</h3>

                <div class="muted">{{ $item->kategori }}</div>

                <p class="muted">
                    {{ $item->tanggal?->format('d-m-Y') ?? '-' }}
                </p>

                <p>{{ $item->keterangan }}</p>

                <form method="POST"
                      action="{{ route('admin.dokumentasi-ronda.update', $item->id) }}"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <label>Edit Judul</label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ $item->judul }}"
                           required>

                    <label>Kategori</label>

                    <select name="kategori" class="form-control" required>
                        @foreach(['Petugas Keamanan','Kegiatan Ronda','Patroli','Pos Ronda'] as $kategori)
                            <option value="{{ $kategori }}"
                                @selected($item->kategori == $kategori)>
                                {{ $kategori }}
                            </option>
                        @endforeach
                    </select>

                    <label>Ganti Foto (opsional)</label>

                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept="image/jpeg,image/png,image/webp">

                    <label>Keterangan</label>

                    <textarea name="keterangan"
                              class="form-control"
                              rows="2">{{ $item->keterangan }}</textarea>

                    <button class="btn btn-edit" type="submit">
                        Simpan Perubahan
                    </button>

                </form>

                <form method="POST"
                      action="{{ route('admin.dokumentasi-ronda.destroy', $item->id) }}"
                      onsubmit="return confirm('Hapus dokumentasi ini?')"
                      style="margin-top:10px">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-delete" type="submit">
                        Hapus Foto
                    </button>

                </form>

            </div>

        @empty

            <p class="muted">
                Belum ada dokumentasi yang diupload.
            </p>

        @endforelse

    </div>

</section>

@endsection
