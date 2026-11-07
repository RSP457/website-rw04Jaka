
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Admin | RW 04</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #202536;
        }

        /* MAIN CONTENT */
        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 28px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 27px;
        }

        .muted {
            color: #747b8b;
            font-size: 14px;
        }

        .profile {
            background: white;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 14px;
        }

        /* STATISTIK */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin: 22px 0;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 22px;
            box-shadow: 0 3px 15px #20253608;
        }

        .card-label {
            color: #747b8b;
            font-size: 14px;
        }

        .number {
            font-size: 27px;
            font-weight: bold;
            margin-top: 14px;
        }

        /* SECTION */
        .section {
            background: white;
            padding: 24px;
            border-radius: 12px;
            margin-top: 22px;
            box-shadow: 0 3px 15px #20253608;
        }

        .section h2 {
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 18px;
        }

        /* QUICK LINKS */
        .quick-links {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
        }

        .quick-link {
            border: 1px solid #e8eaf0;
            border-radius: 10px;
            padding: 18px;
            color: #a91634;
            text-decoration: none;
            font-weight: bold;
            transition: .2s;
        }

        .quick-link:hover {
            border-color: #a91634;
            background: #fff9fa;
        }

        .quick-link span {
            display: block;
            font-size: 13px;
            color: #747b8b;
            font-weight: normal;
            margin-top: 8px;
        }

        /* UPLOAD JADWAL RONDA */
        .upload-description {
            color: #747b8b;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .upload-form {
            border: 1px solid #e8eaf0;
            border-radius: 10px;
            padding: 20px;
        }

        .upload-label {
            display: block;
            font-weight: bold;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .upload-input {
            display: block;
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 8px;
        }

        .upload-button {
            background: #a91634;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 15px;
        }

        .upload-button:hover {
            background: #851329;
        }

        /* PREVIEW FOTO */
        .preview-container {
            margin-top: 25px;
        }

        .preview-container h3 {
            font-size: 16px;
            margin-bottom: 12px;
        }

        .preview-image {
            display: block;
            width: 100%;
            max-width: 700px;
            height: auto;
            border-radius: 8px;
            border: 1px solid #e8eaf0;
        }

        /* ALERT */
        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        .alert-error {
            background: #f8d7da;
            color: #842029;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        /* RESPONSIVE */
        @media(max-width: 1050px) {
            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width: 700px) {
            .main {
                margin-left: 0;
                padding: 18px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .cards,
            .quick-links {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR TEMPLATE --}}
    @include('admin.partials.sidebar')

    <main class="main">

        {{-- HEADER DASHBOARD --}}
        <div class="topbar">

            <div>
                <h1>Dashboard</h1>

                <div class="muted">
                    Ringkasan pengelolaan RW 04 Jatinegara Kaum
                </div>
            </div>

            <div class="profile">
                Admin:
                <strong>{{ auth()->user()->name }}</strong>
            </div>

        </div>

        {{-- STATISTIK --}}
        <div class="cards">

            <div class="card">
                <div class="card-label">Total Warga</div>
                <div class="number">0</div>
                <div class="muted">Data warga terdaftar</div>
            </div>

            <div class="card">
                <div class="card-label">Saldo Kas RW</div>
                <div class="number">Rp0</div>
                <div class="muted">Saldo sementara</div>
            </div>

            <div class="card">
                <div class="card-label">Berita</div>
                <div class="number">0</div>
                <div class="muted">Artikel dipublikasikan</div>
            </div>

            <div class="card">
                <div class="card-label">Agenda</div>
                <div class="number">0</div>
                <div class="muted">Kegiatan RW</div>
            </div>

        </div>

        {{-- AKSES CEPAT --}}
        <section class="section">

            <h2>Akses Cepat</h2>

            <div class="quick-links">

                <a class="quick-link" href="/admin/warga">
                    Data Warga
                    <span>Kelola data warga RW 04</span>
                </a>

                <a class="quick-link" href="/admin/kas-rw">
                    Keuangan Kas
                    <span>Catat pemasukan dan pengeluaran</span>
                </a>

                <a class="quick-link" href="/admin/agenda">
                    Agenda Kegiatan
                    <span>Kelola jadwal kegiatan warga</span>
                </a>

            </div>

        </section>

        {{-- KELOLA JADWAL RONDA --}}
        @php
            $jadwalRonda = \App\Models\JadwalRonda::latest()->first();
        @endphp

        <section class="section">

            <h2>Kelola Foto Jadwal Ronda</h2>

            <p class="upload-description">
                Upload foto jadwal ronda terbaru untuk ditampilkan
                pada halaman Layanan Keamanan Wilayah RW 04.
            </p>

            {{-- PESAN BERHASIL --}}
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- PESAN ERROR --}}
            @if($errors->any())
                <div class="alert-error">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- FORM UPLOAD --}}
            <form
                class="upload-form"
                action="{{ route('admin.jadwal-ronda.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <label class="upload-label" for="foto">
                    Pilih Foto Jadwal Ronda
                </label>

                <input
                    type="file"
                    name="foto"
                    id="foto"
                    class="upload-input"
                    accept="image/jpeg,image/png,image/webp"
                    required
                >

                <div class="muted">
                    Format JPG, PNG, WEBP. Maksimal 5 MB.
                </div>

                <button type="submit" class="upload-button">
                    Upload Foto Jadwal
                </button>

            </form>

            {{-- FOTO SAAT INI --}}
            <div class="preview-container">

                <h3>Foto Jadwal Ronda Saat Ini</h3>

                @if($jadwalRonda && $jadwalRonda->foto)

                    <img
                        src="{{ asset('storage/' . $jadwalRonda->foto) }}"
                        alt="Jadwal Ronda RW 04"
                        class="preview-image"
                    >

                @else

                    <p class="muted">
                        Belum ada foto jadwal ronda yang diupload.
                    </p>

                @endif

            </div>

        </section>

        {{-- AKTIVITAS TERBARU --}}
        <section class="section">

            <h2>Aktivitas Terbaru</h2>

            <p class="muted">
                Aktivitas akan ditampilkan setelah modul data dan transaksi kas
                terhubung ke database.
            </p>

        </section>

    </main>

</body>
</html>
