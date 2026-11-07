@extends('admin.partials.app')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <a href="{{ route('admin.berita.index') }}"
           class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
        </a>

        <h3 class="fw-bold mt-3 mb-1">Tambah Berita</h3>
        <p class="text-muted mb-0">
            Tambahkan informasi terbaru untuk masyarakat RW 04.
        </p>
    </div>

    {{-- ERROR VALIDASI --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali data yang dimasukkan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.berita.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row g-4">

            {{-- FORM UTAMA --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-pencil-square me-2"></i>
                            Informasi Berita
                        </h5>
                    </div>

                    <div class="card-body">

                        {{-- JUDUL --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Judul Berita <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="judul"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul') }}"
                                   placeholder="Masukkan judul berita"
                                   required>

                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- RINGKASAN --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Ringkasan Berita
                            </label>

                            <textarea name="ringkasan"
                                      rows="3"
                                      maxlength="1000"
                                      class="form-control @error('ringkasan') is-invalid @enderror"
                                      placeholder="Tuliskan ringkasan singkat berita...">{{ old('ringkasan') }}</textarea>

                            @error('ringkasan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ISI BERITA --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Isi Berita <span class="text-danger">*</span>
                            </label>

                            <textarea name="isi"
                                      rows="12"
                                      class="form-control @error('isi') is-invalid @enderror"
                                      placeholder="Tuliskan isi berita secara lengkap..."
                                      required>{{ old('isi') }}</textarea>

                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>

            </div>

            {{-- SIDEBAR FORM --}}
            <div class="col-lg-4">

                {{-- GAMBAR --}}
                <div class="card border-0 shadow-sm rounded-3 mb-4">

                    <div class="card-header bg-white py-3">
                        <h6 class="fw-bold mb-0">
                            <i class="bi bi-image me-2"></i>
                            Gambar Berita
                        </h6>
                    </div>

                    <div class="card-body">

                        <div class="mb-3 text-center">
                            <img id="previewGambar"
                                 src=""
                                 class="img-fluid rounded d-none"
                                 style="max-height:200px; width:100%; object-fit:cover;">

                            <div id="placeholderGambar"
                                 class="bg-light rounded p-5 text-muted">
                                <i class="bi bi-cloud-upload fs-1"></i>
                                <p class="mb-0 mt-2">Preview gambar</p>
                            </div>
                        </div>

                        <label class="form-label fw-semibold">
                            Pilih Gambar
                        </label>

                        <input type="file"
                               name="gambar"
                               id="gambar"
                               class="form-control @error('gambar') is-invalid @enderror"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Format JPG, JPEG, PNG, WEBP. Maksimal 5 MB.
                        </small>

                        @error('gambar')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                </div>

                {{-- PUBLIKASI --}}
                <div class="card border-0 shadow-sm rounded-3 mb-4">

                    <div class="card-header bg-white py-3">
                        <h6 class="fw-bold mb-0">
                            <i class="bi bi-gear me-2"></i>
                            Pengaturan Publikasi
                        </h6>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Tanggal Publikasi
                            </label>

                            <input type="date"
                                   name="tanggal_publikasi"
                                   class="form-control"
                                   value="{{ old('tanggal_publikasi') }}">

                            <small class="text-muted">
                                Kosongkan untuk menggunakan tanggal otomatis saat diterbitkan.
                            </small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Status Berita
                            </label>

                            <select name="status" class="form-select" required>

                                <option value="draft"
                                    {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                                <option value="terbit"
                                    {{ old('status') == 'terbit' ? 'selected' : '' }}>
                                    Terbit
                                </option>

                            </select>
                        </div>

                    </div>
                </div>

                {{-- TOMBOL --}}
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">

                        <button type="submit"
                                class="btn btn-primary w-100 mb-2">
                            <i class="bi bi-save me-1"></i>
                            Simpan Berita
                        </button>

                        <a href="{{ route('admin.berita.index') }}"
                           class="btn btn-light border w-100">
                            Batal
                        </a>

                    </div>
                </div>

            </div>

        </div>

    </form>

</div>

{{-- PREVIEW GAMBAR --}}
<script>
document.getElementById('gambar').addEventListener('change', function(event) {

    const file = event.target.files[0];
    const preview = document.getElementById('previewGambar');
    const placeholder = document.getElementById('placeholderGambar');

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
        placeholder.classList.add('d-none');
    } else {
        preview.src = '';
        preview.classList.add('d-none');
        placeholder.classList.remove('d-none');
    }

});
</script>

@endsection
