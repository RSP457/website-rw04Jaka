<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami | RW 04 Jatinegara Kaum</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          rel="stylesheet">

    <style>
        :root {
            --merah: #c51f3a;
            --merah-gelap: #841526;
            --latar: #fbf6f7;
            --teks: #202b3c;
        }

        body {
            margin: 0;
            background: var(--latar);
            color: var(--teks);
            font-family: Arial, sans-serif;
        }

        .hero {
            background: white;
            padding: 65px max(5%, calc((100% - 1400px) / 2)) 60px;
            border-radius: 0 0 30px 30px;
        }

        .hero h1 {
            color: #171717;
            font-size: clamp(38px, 5vw, 60px);
            font-weight: 700;
            margin-bottom: 15px;
        }

        .hero p {
            color: #64748b;
            font-size: 17px;
        }

        .contact-section {
            max-width: 1400px;
            margin: auto;
            padding: 65px 5%;
        }

        .section-title {
            color: var(--merah-gelap);
            font-weight: 700;
        }

        .info-card,
        .form-card {
            background: white;
            border: 1px solid #f0dfe2;
            border-radius: 18px;
            padding: 30px;
            height: 100%;
            box-shadow: 0 10px 30px rgba(70, 20, 30, .04);
        }

        .info-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #fff0f2;
            color: var(--merah);
            font-size: 20px;
            flex-shrink: 0;
        }

        .info-item {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .info-item h6 {
            font-weight: 700;
            margin: 2px 0 8px;
        }

        .info-item p {
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 0;
        }

        .schedule {
            border-top: 1px solid #f0e3e5;
            padding-top: 20px;
            margin-top: 10px;
        }

        .schedule-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 9px 0;
            border-bottom: 1px dashed #eee;
            font-size: 14px;
        }

        .schedule-row span:last-child {
            text-align: right;
            font-weight: 600;
        }

        .btn-wa {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            width: 100%;
            background: #168b52;
            color: white;
            padding: 14px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            transition: .2s;
        }

        .btn-wa:hover {
            background: #106c3e;
            color: white;
            transform: translateY(-2px);
        }

        .form-card {
            border-top: 4px solid var(--merah);
        }

        .form-label {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            min-height: 48px;
            border: 1px solid #dfe3e8;
            border-radius: 9px;
            padding: 12px 14px;
        }

        textarea.form-control {
            min-height: 145px;
            resize: vertical;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--merah);
            box-shadow: 0 0 0 .2rem rgba(197, 31, 58, .1);
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            border: 0;
            border-radius: 10px;
            background: var(--merah);
            color: white;
            font-weight: 700;
        }

        .btn-submit:hover {
            background: var(--merah-gelap);
        }

        .contact-note {
            margin-top: 22px;
            padding: 18px;
            border-left: 4px solid #e3b341;
            border-radius: 9px;
            background: #fffaf0;
            color: #685b42;
            font-size: 14px;
            line-height: 1.7;
        }

        footer {
            background: #171d2b;
            color: #e5e7eb;
            padding: 28px 5%;
            text-align: center;
            font-size: 14px;
        }

        footer strong {
            color: white;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 45px 6%;
            }

            .contact-section {
                padding: 35px 5%;
            }

            .info-card,
            .form-card {
                padding: 23px;
            }

            .schedule-row {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    @include('templates.navbar')

    {{-- HERO --}}
    <section class="hero">
        <h1>Hubungi Kami</h1>
        <p>
            Punya pertanyaan, saran, atau pengaduan?
            Kami siap membantu warga RW 04 Jatinegara Kaum.
        </p>
    </section>

    {{-- KONTEN KONTAK --}}
    <section class="contact-section">
        <div class="row g-4">

            {{-- INFORMASI KONTAK --}}
            <div class="col-lg-5">
                <div class="info-card">
                    <h3 class="section-title mb-4">Informasi Kontak</h3>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h6>Sekretariat RW 04</h6>
                            <p>
                                RW 04 Jatinegara Kaum<br>
                                Kelurahan Jatinegara Kaum<br>
                                Kecamatan Pulogadung, Jakarta Timur
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <div>
                            <h6>WhatsApp RW 04</h6>
                            <p>0813-1016-9542</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h6>Layanan Informasi</h6>
                            <p>
                                Untuk pertanyaan, saran, pengaduan,
                                dan informasi administrasi warga.
                            </p>
                        </div>
                    </div>

                    <div class="schedule">
                        <h6 class="fw-bold mb-3">
                            <i class="fa-regular fa-clock me-2"
                               style="color: var(--merah)"></i>
                            Jam Operasional
                        </h6>

                        <div class="schedule-row">
                            <span>Senin–Jumat</span>
                            <span>09.00–15.00 WIB</span>
                        </div>

                        <div class="schedule-row">
                            <span>Sabtu</span>
                            <span>09.00–12.00 WIB</span>
                        </div>

                        <div class="schedule-row">
                            <span>Minggu</span>
                            <span>Tutup</span>
                        </div>
                    </div>

                    <a class="btn-wa mt-4"
                       href="https://wa.me/6281310169542?text=Halo%20Pengurus%20RW%2004%20Jatinegara%20Kaum%2C%20saya%20ingin%20bertanya."
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="fa-brands fa-whatsapp fa-lg"></i>
                        Hubungi via WhatsApp
                    </a>

                    <div class="contact-note">
                        <strong>Informasi:</strong>
                        Silakan hubungi pengurus RW 04 untuk memperoleh
                        informasi mengenai layanan administrasi,
                        kegiatan lingkungan, maupun penyampaian aspirasi warga.
                    </div>
                </div>
            </div>

            {{-- FORMULIR --}}
            <div class="col-lg-7">
                <div class="form-card">
                    <h3 class="section-title mb-2">Kirim Pesan</h3>
                    <p class="text-secondary mb-4">
                        Silakan isi formulir berikut dengan informasi yang benar.
                    </p>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Periksa kembali formulir Anda.</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kontak.kirim') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">
                                    Nama lengkap *
                                </label>
                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    class="form-control"
                                    value="{{ old('nama') }}"
                                    placeholder="Masukkan nama lengkap"
                                    maxlength="100"
                                    autocomplete="name"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">
                                    Email *
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    placeholder="nama@email.com"
                                    maxlength="150"
                                    autocomplete="email"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="telepon" class="form-label">
                                    Nomor WhatsApp
                                </label>
                                <input
                                    type="tel"
                                    id="telepon"
                                    name="telepon"
                                    class="form-control"
                                    value="{{ old('telepon') }}"
                                    placeholder="08xxxxxxxxxx"
                                    maxlength="20"
                                    autocomplete="tel">
                            </div>

                            <div class="col-md-6">
                                <label for="kategori" class="form-label">
                                    Kategori *
                                </label>
                                <select
                                    id="kategori"
                                    name="kategori"
                                    class="form-select"
                                    required>
                                    <option value="">Pilih kategori</option>
                                    @foreach ([
                                        'Pertanyaan',
                                        'Saran',
                                        'Pengaduan',
                                        'Administrasi',
                                        'Lainnya'
                                    ] as $kategori)
                                        <option
                                            value="{{ $kategori }}"
                                            @selected(old('kategori') === $kategori)>
                                            {{ $kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="subjek" class="form-label">
                                    Perihal *
                                </label>
                                <input
                                    type="text"
                                    id="subjek"
                                    name="subjek"
                                    class="form-control"
                                    value="{{ old('subjek') }}"
                                    placeholder="Tuliskan perihal pesan"
                                    maxlength="150"
                                    required>
                            </div>

                            <div class="col-12">
                                <label for="pesan" class="form-label">
                                    Pesan Anda *
                                </label>
                                <textarea
                                    id="pesan"
                                    name="pesan"
                                    class="form-control"
                                    placeholder="Tuliskan pesan atau keperluan Anda..."
                                    maxlength="3000"
                                    required>{{ old('pesan') }}</textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn-submit">
                                    <i class="fa-solid fa-paper-plane me-2"></i>
                                    Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>

                    <p class="text-secondary small mt-3 mb-0">
                        * Wajib diisi. Mohon tidak mencantumkan kata sandi
                        atau informasi pribadi yang sensitif.
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- FOOTER --}}
    @include('templates.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
