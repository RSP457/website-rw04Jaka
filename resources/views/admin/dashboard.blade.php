
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin | RW 04</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; font-family: Arial, sans-serif;
            background: #f5f6fa; color: #202536;
        }
        .sidebar {
            position: fixed; inset: 0 auto 0 0; width: 250px;
            background: #a91634; color: white; padding: 25px 18px;
            overflow-y: auto;
        }
        .brand { font-size: 24px; font-weight: bold; margin-bottom: 5px; }
        .subtitle { font-size: 13px; opacity: .8; margin-bottom: 28px; }
        .menu-title {
            font-size: 11px; text-transform: uppercase;
            opacity: .7; margin: 24px 10px 8px;
        }
        .menu {
            display: block; color: white; text-decoration: none;
            padding: 12px; border-radius: 8px; margin: 4px 0;
        }
        .menu:hover, .menu.active { background: #ffffff25; }
        .main { margin-left: 250px; padding: 30px; }
        .topbar {
            display: flex; justify-content: space-between;
            align-items: center; gap: 15px; margin-bottom: 28px;
        }
        h1 { margin: 0 0 8px; font-size: 27px; }
        .muted { color: #747b8b; font-size: 14px; }
        .profile {
            background: white; padding: 12px 16px;
            border-radius: 10px; font-size: 14px;
        }
        .cards {
            display: grid; grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px; margin: 22px 0;
        }
        .card {
            background: white; border-radius: 12px; padding: 22px;
            box-shadow: 0 3px 15px #20253608;
        }
        .card-label { color: #747b8b; font-size: 14px; }
        .number { font-size: 27px; font-weight: bold; margin-top: 14px; }
        .section {
            background: white; padding: 24px; border-radius: 12px;
            margin-top: 22px;
        }
        .section h2 { font-size: 18px; margin-top: 0; }
        .quick-links {
            display: grid; grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
        }
        .quick-link {
            border: 1px solid #e8eaf0; border-radius: 10px;
            padding: 18px; color: #a91634; text-decoration: none;
            font-weight: bold;
        }
        .quick-link span {
            display: block; font-size: 13px; color: #747b8b;
            font-weight: normal; margin-top: 8px;
        }
        .logout {
            width: 100%; margin-top: 10px; padding: 11px;
            border: 1px solid #ffffff70; border-radius: 8px;
            background: transparent; color: white; cursor: pointer;
        }
        @media(max-width: 1050px) {
            .cards { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media(max-width: 700px) {
            .sidebar { position: relative; width: 100%; }
            .main { margin-left: 0; padding: 18px; }
            .topbar { align-items: flex-start; flex-direction: column; }
            .cards, .quick-links { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="brand">RW 04</div>
        <div class="subtitle">Panel Administrasi</div>

        <div class="menu-title">Menu Utama</div>
        <a class="menu active" href="{{ route('admin.dashboard') }}">▦ Dashboard</a>
        <a class="menu" href="/admin/warga">♙ Data Warga</a>
        <a class="menu" href="/admin/kas-rw">▤ Kas RW</a>

        <div class="menu-title">Konten Website</div>
        <a class="menu" href="/admin/berita">▣ Berita</a>
        <a class="menu" href="/admin/pengumuman">⚑ Pengumuman</a>
        <a class="menu" href="/admin/agenda">▦ Agenda Kegiatan</a>
        <a class="menu" href="/admin/layanan">◇ Layanan Warga</a>

        <div class="menu-title">Lainnya</div>
        <a class="menu" href="{{ route('beranda') }}">↗ Lihat Website</a>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="logout" type="submit">Logout</button>
        </form>
    </aside>

    <main class="main">
        <div class="topbar">
            <div>
                <h1>Dashboard</h1>
                <div class="muted">Ringkasan pengelolaan RW 04 Jatinegara Kaum</div>
            </div>
            <div class="profile">
                Admin: <strong>{{ auth()->user()->name }}</strong>
            </div>
        </div>

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
