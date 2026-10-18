@extends('layouts.app')

@section('title', 'Beranda | Portal RW 04 Jatinegara Kaum')

@section('content')

<style>
    :root {
        --rw-primary: #b21835;
        --rw-primary-dark: #8f1229;
        --rw-soft: #fff1f3;
        --rw-text: #1b2432;
        --rw-muted: #718096;
        --rw-border: #e8ebf0;
    }

    .rw-home {
        color: var(--rw-text);
        overflow: hidden;
    }

    .rw-container {
        width: min(1240px, calc(100% - 48px));
        margin: auto;
    }

    .rw-hero {
        padding: 76px 0 88px;
        background:
            radial-gradient(circle at 90% 15%, #f8dfe4 0, transparent 32%),
            linear-gradient(120deg, #ffffff 45%, #fff8f9 100%);
    }

    .rw-hero-grid {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        align-items: center;
        gap: 64px;
    }

    .rw-badge {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 10px 15px;
        border-radius: 50px;
        background: var(--rw-soft);
        color: var(--rw-primary);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .7px;
        margin-bottom: 24px;
    }

    .rw-hero h1 {
        font-size: clamp(38px, 4.5vw, 64px);
        line-height: 1.12;
        letter-spacing: -2px;
        font-weight: 800;
        margin: 0 0 22px;
    }

    .rw-hero h1 span {
        color: var(--rw-primary);
    }

    .rw-hero-description {
        color: var(--rw-muted);
        font-size: 16px;
        line-height: 1.9;
        max-width: 570px;
        margin-bottom: 28px;
    }

    .rw-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .rw-btn {
        min-height: 51px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        padding: 0 23px;
        border-radius: 11px;
        text-decoration: none;
        font-weight: 700;
        font-size: 14px;
        transition: .2s ease;
    }

    .rw-btn-primary {
        color: white;
        background: var(--rw-primary);
        border: 1px solid var(--rw-primary);
    }

    .rw-btn-primary:hover {
        color: white;
        background: var(--rw-primary-dark);
        transform: translateY(-2px);
    }

    .rw-btn-outline {
        color: var(--rw-text);
        background: white;
        border: 1px solid var(--rw-border);
    }

    .rw-btn-outline:hover {
        color: var(--rw-primary);
        border-color: var(--rw-primary);
    }

    .rw-hero-visual {
        position: relative;
        padding: 10px 0 20px;
    }

    .rw-hero-image {
        min-height: 420px;
        border-radius: 26px;
        background:
            linear-gradient(180deg, rgba(20, 28, 42, .05), rgba(20, 28, 42, .2)),
            url('https://images.unsplash.com/photo-1480714378408-67cf0d13bc1b?auto=format&fit=crop&w=1200&q=85')
            center/cover;
        box-shadow: 0 25px 60px rgba(45, 35, 40, .13);
    }

    .rw-floating-card {
        position: absolute;
        left: -28px;
        bottom: 0;
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 18px 22px;
        background: white;
        border: 1px solid rgba(230, 230, 230, .8);
        border-radius: 17px;
        box-shadow: 0 15px 40px rgba(30, 30, 30, .1);
    }

    .rw-floating-icon {
        width: 48px;
        height: 48px;
        display: grid;
        place-items: center;
        border-radius: 13px;
        background: var(--rw-soft);
        font-size: 24px;
    }

    .rw-floating-card strong {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .rw-floating-card small {
        color: var(--rw-muted);
        font-size: 12px;
    }

    .rw-section {
        padding: 76px 0;
    }

    .rw-section-soft {
        background: #f8f9fb;
    }

    .rw-section-heading {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 20px;
        margin-bottom: 32px;
    }

    .rw-section-heading h2 {
        font-size: clamp(27px, 3vw, 38px);
        font-weight: 800;
        letter-spacing: -1px;
        margin: 0 0 10px;
    }

    .rw-section-heading p {
        color: var(--rw-muted);
        margin: 0;
        line-height: 1.7;
    }

    .rw-text-link {
        color: var(--rw-primary);
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        white-space: nowrap;
    }

    .rw-service-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .rw-service-card {
        display: block;
        padding: 28px;
        background: white;
        border: 1px solid var(--rw-border);
        border-radius: 18px;
        text-decoration: none;
        color: var(--rw-text);
        transition: .22s ease;
    }

    .rw-service-card:hover {
        border-color: #e7aab6;
        box-shadow: 0 15px 35px rgba(40, 30, 35, .07);
        transform: translateY(-4px);
        color: var(--rw-text);
    }

    .rw-service-icon {
        width: 54px;
        height: 54px;
        display: grid;
        place-items: center;
        background: var(--rw-soft);
        border-radius: 15px;
        color: var(--rw-primary);
        font-size: 25px;
        margin-bottom: 22px;
    }

    .rw-service-card h3 {
        font-size: 19px;
        font-weight: 750;
        margin-bottom: 10px;
    }

    .rw-service-card p {
        font-size: 14px;
        color: var(--rw-muted);
        line-height: 1.8;
        margin-bottom: 18px;
    }

    .rw-card-more {
        color: var(--rw-primary);
        font-size: 13px;
        font-weight: 750;
    }

    .rw-news-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .rw-news-card {
        overflow: hidden;
        background: white;
        border: 1px solid var(--rw-border);
        border-radius: 17px;
    }

    .rw-news-image {
        height: 205px;
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, #fbe7eb, #f5f6fa);
        font-size: 52px;
    }

    .rw-news-body {
        padding: 23px;
    }

    .rw-news-tag {
        display: inline-block;
        color: var(--rw-primary);
        background: var(--rw-soft);
        padding: 6px 10px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 750;
        margin-bottom: 13px;
    }

    .rw-news-body h3 {
        font-size: 18px;
        font-weight: 750;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    .rw-news-body p {
        color: var(--rw-muted);
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
    }

    .rw-info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px;
    }

    .rw-info-card {
        padding: 30px;
        background: white;
        border: 1px solid var(--rw-border);
        border-radius: 18px;
    }

    .rw-info-card h3 {
        font-size: 21px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .rw-info-card p {
        color: var(--rw-muted);
        line-height: 1.8;
        font-size: 14px;
    }

    .rw-agenda-item {
        display: flex;
        gap: 16px;
        align-items: flex-start;
        padding: 16px 0;
        border-bottom: 1px solid var(--rw-border);
    }

    .rw-agenda-item:last-child {
        border-bottom: 0;
    }

    .rw-agenda-date {
        flex: 0 0 55px;
        padding: 10px 5px;
        border-radius: 11px;
        background: var(--rw-soft);
        color: var(--rw-primary);
        text-align: center;
        font-weight: 800;
        font-size: 12px;
    }

    .rw-agenda-item strong {
        display: block;
        margin-bottom: 6px;
    }

    .rw-agenda-item small {
        color: var(--rw-muted);
        line-height: 1.7;
    }

    .rw-contact {
        padding: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 25px;
        color: white;
        background: linear-gradient(120deg, #a51632, #c32b49);
        border-radius: 23px;
    }

    .rw-contact h2 {
        font-size: clamp(25px, 3vw, 35px);
        font-weight: 800;
        margin-bottom: 12px;
    }

    .rw-contact p {
        color: #ffe4e9;
        margin: 0;
        line-height: 1.8;
    }

    .rw-contact .rw-btn {
        flex-shrink: 0;
        background: white;
        color: var(--rw-primary);
    }

    @media (max-width: 900px) {
        .rw-hero-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .rw-hero {
            padding: 55px 0 65px;
        }

        .rw-hero-visual {
            max-width: 650px;
            width: 100%;
            margin: auto;
        }

        .rw-hero-image {
            min-height: 350px;
        }

        .rw-floating-card {
            left: 12px;
        }

        .rw-service-grid,
        .rw-news-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .rw-container {
            width: calc(100% - 32px);
        }

        .rw-hero {
            padding: 42px 0 55px;
        }

        .rw-hero h1 {
            font-size: 39px;
            letter-spacing: -1.4px;
        }

        .rw-hero-description {
            font-size: 14px;
        }

        .rw-hero-image {
            min-height: 260px;
            border-radius: 18px;
        }

        .rw-floating-card {
            padding: 13px;
            left: 5px;
            right: 5px;
            gap: 10px;
        }

        .rw-floating-icon {
            width: 42px;
            height: 42px;
            font-size: 20px;
        }

        .rw-section {
            padding: 52px 0;
        }

        .rw-section-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .rw-service-grid,
        .rw-news-grid,
        .rw-info-grid {
            grid-template-columns: 1fr;
        }

        .rw-service-card {
            padding: 23px;
        }

        .rw-contact {
            align-items: flex-start;
            flex-direction: column;
            padding: 27px;
        }

        .rw-actions .rw-btn {
            width: 100%;
        }
    }
</style>

<div class="rw-home">

    {{-- HERO --}}
    <section class="rw-hero" id="beranda">
        <div class="rw-container">
            <div class="rw-hero-grid">

                <div>
                    <div class="rw-badge">
                        ✦ PORTAL INFORMASI RW 04
                    </div>

                    <h1>
                        Bersama Mewujudkan Lingkungan
                        <span>Tertib, Aman, dan Nyaman.</span>
                    </h1>

                    <p class="rw-hero-description">
                        Selamat datang di website RW 04 Jatinegara Kaum.
                        Temukan informasi lingkungan, layanan administrasi,
                        agenda kegiatan, dan kabar terbaru warga dalam satu tempat.
                    </p>

                    <div class="rw-actions">
                        <a href="#layanan" class="rw-btn rw-btn-primary">
                            Jelajahi Layanan →
                        </a>

                        <a href="#tentang" class="rw-btn rw-btn-outline">
                            Tentang RW 04
                        </a>
                    </div>
                </div>

                <div class="rw-hero-visual">
                    <div class="rw-hero-image" role="img"
                         aria-label="Ilustrasi lingkungan perkotaan"></div>

                    <div class="rw-floating-card">
                        <div class="rw-floating-icon">♧</div>
                        <div>
                            <strong>Warga RW 04</strong>
                            <small>Bersatu, peduli, dan saling membantu</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- LAYANAN --}}
    <section class="rw-section" id="layanan">
        <div class="rw-container">

            <div class="rw-section-heading">
                <div>
                    <h2>Layanan Warga</h2>
                    <p>Akses informasi dan layanan lingkungan dengan lebih mudah.</p>
                </div>

                <a href="#kontak" class="rw-text-link">
                    Informasi layanan →
                </a>
            </div>

            <div class="rw-service-grid">

                <a href="{{ url('/layanan/administrasi') }}"
                   class="rw-service-card">
                    <div class="rw-service-icon">▤</div>
                    <h3>Administrasi Warga</h3>
                    <p>
                        Informasi pengantar RT/RW, surat keterangan,
                        dan kebutuhan administrasi warga.
                    </p>
                    <span class="rw-card-more">Lihat layanan →</span>
                </a>

                <a href="{{ url('/layanan/keamanan') }}"
                   class="rw-service-card">
                    <div class="rw-service-icon">♧</div>
                    <h3>Keamanan Lingkungan</h3>
                    <p>
                        Informasi ronda, jadwal keamanan,
                        dan pelaporan kondisi lingkungan.
                    </p>
                    <span class="rw-card-more">Lihat layanan →</span>
                </a>

                <a href="{{ url('/layanan/kebersihan') }}"
                   class="rw-service-card">
                    <div class="rw-service-icon">♻</div>
                    <h3>Kebersihan Lingkungan</h3>
                    <p>
                        Informasi kerja bakti, kebersihan fasilitas umum,
                        dan pengelolaan sampah.
                    </p>
                    <span class="rw-card-more">Lihat layanan →</span>
                </a>

            </div>
        </div>
    </section>

    {{-- TENTANG RW --}}
    <section class="rw-section rw-section-soft" id="tentang">
        <div class="rw-container">

            <div class="rw-section-heading">
                <div>
                    <h2>Mengenal RW 04</h2>
                    <p>Membangun lingkungan melalui kepedulian dan kerja sama warga.</p>
                </div>
            </div>

            <div class="rw-info-grid">
                <div class="rw-info-card">
                    <h3>Profil RW 04</h3>
                    <p>
                        Portal informasi RW 04 Jatinegara Kaum menjadi
                        sarana untuk mengenal lingkungan, perangkat wilayah,
                        kegiatan kemasyarakatan, dan informasi pelayanan warga.
                    </p>
                    <a href="{{ url('/tentang/profil-rw') }}"
                       class="rw-text-link">
                        Pelajari profil →
                    </a>
                </div>

                <div class="rw-info-card">
                    <h3>Informasi RT</h3>
                    <p>
                        Temukan informasi pengurus RT, koordinasi lingkungan,
                        serta kegiatan warga di masing-masing wilayah RT.
                    </p>
                    <a href="{{ url('/tentang/profil-rt') }}"
                       class="rw-text-link">
                        Lihat informasi RT →
                    </a>
                </div>
            </div>

        </div>
    </section>

    {{-- BERITA --}}
    <section class="rw-section" id="berita">
        <div class="rw-container">

            <div class="rw-section-heading">
                <div>
                    <h2>Berita & Informasi</h2>
                    <p>Ikuti kabar dan kegiatan terbaru di lingkungan RW 04.</p>
                </div>

                <a href="{{ url('/informasi/berita') }}"
                   class="rw-text-link">
                    Semua berita →
                </a>
            </div>

            <div class="rw-news-grid">

                <article class="rw-news-card">
                    <div class="rw-news-image">🤝</div>
                    <div class="rw-news-body">
                        <span class="rw-news-tag">Kemasyarakatan</span>
                        <h3>Kebersamaan Warga untuk Lingkungan yang Lebih Baik</h3>
                        <p>
                            Partisipasi dan kepedulian warga menjadi bagian
                            penting dalam menciptakan lingkungan yang nyaman.
                        </p>
                    </div>
                </article>

                <article class="rw-news-card">
                    <div class="rw-news-image">🧹</div>
                    <div class="rw-news-body">
                        <span class="rw-news-tag">Lingkungan</span>
                        <h3>Menjaga Kebersihan Area Permukiman</h3>
                        <p>
                            Kebiasaan menjaga kebersihan dapat dimulai
                            dari rumah dan lingkungan sekitar.
                        </p>
                    </div>
                </article>

                <article class="rw-news-card">
                    <div class="rw-news-image">📢</div>
                    <div class="rw-news-body">
                        <span class="rw-news-tag">Pengumuman</span>
                        <h3>Pusat Informasi dan Pengumuman RW</h3>
                        <p>
                            Informasi resmi dan pengumuman kegiatan dapat
                            disampaikan melalui portal RW.
                        </p>
                    </div>
                </article>

            </div>
        </div>
    </section>

    {{-- AGENDA DAN INFORMASI --}}
    <section class="rw-section rw-section-soft" id="agenda">
        <div class="rw-container">

            <div class="rw-section-heading">
                <div>
                    <h2>Agenda & Informasi Wilayah</h2>
                    <p>Informasi kegiatan dan administrasi lingkungan.</p>
                </div>
            </div>

            <div class="rw-info-grid">

                <div class="rw-info-card">
                    <h3>Agenda Kegiatan</h3>

                    <div class="rw-agenda-item">
                        <div class="rw-agenda-date">RT/RW</div>
                        <div>
                            <strong>Pertemuan Warga</strong>
                            <small>
                                Jadwal dan lokasi mengikuti pengumuman
                                resmi pengurus setempat.
                            </small>
                        </div>
                    </div>

                    <div class="rw-agenda-item">
                        <div class="rw-agenda-date">KERJA</div>
                        <div>
                            <strong>Kerja Bakti Lingkungan</strong>
                            <small>
                                Informasi waktu pelaksanaan diumumkan
                                oleh pengurus RW atau RT.
                            </small>
                        </div>
                    </div>

                    <div class="rw-agenda-item">
                        <div class="rw-agenda-date">INFO</div>
                        <div>
                            <strong>Kegiatan Kemasyarakatan</strong>
                            <small>
                                Pantau informasi kegiatan warga melalui
                                pengumuman lingkungan.
                            </small>
                        </div>
                    </div>

                    <a href="{{ url('/agenda') }}" class="rw-text-link">
                        Lihat seluruh agenda →
                    </a>
                </div>

                <div class="rw-info-card">
                    <h3>Data & Transparansi RW</h3>
                    <p>
                        Portal ini dapat dikembangkan untuk menyajikan
                        rekap jumlah warga per RT, informasi kas RW,
                        serta laporan kegiatan lingkungan.
                    </p>

                    <div class="rw-agenda-item">
                        <div class="rw-agenda-date">01</div>
                        <div>
                            <strong>Data Warga per RT</strong>
                            <small>Rekapitulasi data warga sesuai data resmi pengurus.</small>
                        </div>
                    </div>

                    <div class="rw-agenda-item">
                        <div class="rw-agenda-date">02</div>
                        <div>
                            <strong>Informasi Kas RW</strong>
                            <small>Informasi pemasukan dan pengeluaran yang disetujui untuk dipublikasikan.</small>
                        </div>
                    </div>

                    <a href="{{ url('/informasi') }}" class="rw-text-link">
                        Lihat informasi wilayah →
                    </a>
                </div>

            </div>
        </div>
    </section>

<section class="contact-section" id="kontak">
    <div class="contact-layout">

        {{-- INFORMASI SEKRETARIAT --}}
        <div class="contact-info">
            <span class="contact-label">HUBUNGI KAMI</span>

            <h2>Sekretariat RW 04</h2>

            <p class="contact-address">
                RW 04 Jatinegara Kaum<br>
                Pulogadung, Jakarta Timur<br>
                DKI Jakarta
            </p>

            <div class="operational-hours">
                <h3>Jam Operasional</h3>

                <div class="hours-row">
                    <span>Senin–Jumat</span>
                    <span class="hours-line"></span>
                    <strong>09.00–15.00 WIB</strong>
                </div>

                <div class="hours-row">
                    <span>Sabtu</span>
                    <span class="hours-line"></span>
                    <strong>09.00–12.00 WIB</strong>
                </div>

                <div class="hours-row">
                    <span>Minggu</span>
                    <span class="hours-line"></span>
                    <strong>Tutup</strong>
                </div>

                <p class="hours-note">
                    * Jam pelayanan dapat menyesuaikan kegiatan pengurus RW.
                </p>
            </div>

            <div class="contact-note">
                <span class="contact-note-icon">i</span>
                <p>
                    Silakan isi formulir untuk menyampaikan pertanyaan,
                    saran, atau kebutuhan administrasi kepada pengurus RW 04.
                </p>
            </div>
        </div>

        {{-- FORM KONTAK --}}
        <div class="contact-card">
            <div class="contact-card-heading">
                <h2>Kirim Pesan</h2>
                <p>Lengkapi informasi berikut agar kami dapat menindaklanjuti pesan Anda.</p>
            </div>

            <form action="{{ url('/kontak') }}" method="POST">
                @csrf

                <div class="contact-grid">

                    <div class="form-group">
                        <label for="nama">Nama lengkap</label>
                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            placeholder="Masukkan nama lengkap"
                            value="{{ old('nama') }}"
                            required
                        >
                        @error('nama')
                            <small class="form-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rt">RT tempat tinggal</label>
                        <select id="rt" name="rt" required>
                            <option value="">Pilih RT</option>
                            @for ($i = 1; $i <= 11; $i++)
                                <option
                                    value="{{ sprintf('%02d', $i) }}"
                                    @selected(old('rt') == sprintf('%02d', $i))
                                >
                                    RT {{ sprintf('%02d', $i) }}
                                </option>
                            @endfor
                        </select>
                        @error('rt')
                            <small class="form-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telepon">Nomor WhatsApp</label>
                        <input
                            type="tel"
                            id="telepon"
                            name="telepon"
                            placeholder="Contoh: 081234567890"
                            value="{{ old('telepon') }}"
                            required
                        >
                        @error('telepon')
                            <small class="form-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kategori">Perihal</label>
                        <select id="kategori" name="kategori" required>
                            <option value="">Pilih perihal</option>
                            <option value="Administrasi">Administrasi warga</option>
                            <option value="Pengaduan">Pengaduan lingkungan</option>
                            <option value="Kegiatan">Kegiatan warga</option>
                            <option value="Saran">Saran dan masukan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('kategori')
                            <small class="form-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group form-full">
                        <label for="pesan">Pesan Anda</label>
                        <textarea
                            id="pesan"
                            name="pesan"
                            rows="5"
                            placeholder="Tuliskan pertanyaan atau pesan Anda..."
                            required
                        >{{ old('pesan') }}</textarea>
                        @error('pesan')
                            <small class="form-error">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="contact-form-footer">
                    <p>Pastikan data yang Anda masukkan sudah benar.</p>

                    <button type="submit" class="contact-submit">
                        Kirim Pesan <span>→</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>

<style>
.contact-section {
    padding: 75px 24px;
    background: #f7f8fa;
}

.contact-layout {
    width: min(1240px, 100%);
    margin: auto;
    display: grid;
    grid-template-columns: .85fr 1.15fr;
    align-items: start;
    gap: 65px;
}

.contact-info {
    padding-top: 12px;
}

.contact-label {
    display: inline-block;
    padding: 8px 13px;
    border-radius: 30px;
    background: #fff0f2;
    color: #b51e36;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1px;
}

.contact-info > h2 {
    margin: 23px 0 15px;
    color: #1f2937;
    font-size: 28px;
    line-height: 1.3;
}

.contact-address {
    color: #64748b;
    font-size: 15px;
    line-height: 1.9;
}

.operational-hours {
    margin-top: 35px;
}

.operational-hours h3 {
    margin: 0 0 20px;
    color: #1f2937;
    font-size: 20px;
}

.hours-row {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 16px 0;
    color: #64748b;
    font-size: 13px;
}

.hours-row > span:first-child {
    white-space: nowrap;
}

.hours-line {
    flex: 1;
    min-width: 12px;
    border-bottom: 1px solid #dce1e8;
}

.hours-row strong {
    color: #334155;
    font-weight: 600;
    white-space: nowrap;
}

.hours-note {
    margin-top: 20px;
    color: #8992a2;
    font-size: 12px;
    line-height: 1.7;
}

.contact-note {
    display: flex;
    align-items: flex-start;
    gap: 13px;
    margin-top: 32px;
    padding: 18px;
    background: #fff;
    border: 1px solid #e8eaf0;
    border-radius: 12px;
}

.contact-note-icon {
    display: grid;
    place-items: center;
    width: 27px;
    height: 27px;
    flex-shrink: 0;
    border-radius: 50%;
    background: #fff0f2;
    color: #b51e36;
    font-weight: 800;
}

.contact-note p {
    margin: 2px 0 0;
    color: #64748b;
    font-size: 13px;
    line-height: 1.8;
}

.contact-card {
    padding: 34px;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    box-shadow: 0 12px 35px rgba(15, 23, 42, .04);
}

.contact-card-heading {
    margin-bottom: 27px;
}

.contact-card-heading h2 {
    margin: 0 0 10px;
    color: #1f2937;
    font-size: 25px;
}

.contact-card-heading p {
    margin: 0;
    color: #788397;
    font-size: 13px;
    line-height: 1.8;
}

.contact-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 21px 17px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 9px;
    min-width: 0;
}

.form-full {
    grid-column: 1 / -1;
}

.form-group label {
    color: #334155;
    font-size: 13px;
    font-weight: 700;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 14px;
    border: 1px solid #dce1e8;
    border-radius: 9px;
    outline: none;
    background: #fff;
    color: #1f2937;
    font: inherit;
    font-size: 13px;
    transition: border-color .2s, box-shadow .2s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #b51e36;
    box-shadow: 0 0 0 3px rgba(181, 30, 54, .08);
}

.form-group textarea {
    min-height: 130px;
    resize: vertical;
}

.form-error {
    color: #b91c1c;
    font-size: 12px;
}

.contact-form-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-top: 25px;
    padding-top: 22px;
    border-top: 1px solid #edf0f4;
}

.contact-form-footer p {
    margin: 0;
    color: #788397;
    font-size: 12px;
    line-height: 1.7;
}

.contact-submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 14px 20px;
    flex-shrink: 0;
    border: 0;
    border-radius: 9px;
    background: #b51e36;
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
}

.contact-submit:hover {
    background: #94172c;
}

@media (max-width: 900px) {
    .contact-layout {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .contact-info {
        padding-top: 0;
    }

    .contact-note {
        max-width: 600px;
    }
}

@media (max-width: 560px) {
    .contact-section {
        padding: 45px 16px;
    }

    .contact-card {
        padding: 23px 18px;
    }

    .contact-grid {
        grid-template-columns: 1fr;
        gap: 18px;
    }

    .form-full {
        grid-column: auto;
    }

    .contact-form-footer {
        align-items: stretch;
        flex-direction: column;
    }

    .contact-submit {
        width: 100%;
    }

    .hours-row {
        font-size: 12px;
    }
}
</style>

</div>

@endsection

