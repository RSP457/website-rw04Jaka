
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin RW 04')</title>

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

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            background: #a91634;
            color: white;
            padding: 25px 18px;
            overflow-y: auto;
            z-index: 100;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
        }

        .subtitle {
            font-size: 13px;
            opacity: .8;
            margin-top: 5px;
            margin-bottom: 28px;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            opacity: .7;
            margin: 24px 10px 8px;
        }

        .menu {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            margin: 4px 0;
            font-size: 15px;
        }

        .menu:hover,
        .menu.active {
            background: #ffffff25;
        }

        .logout {
            width: 100%;
            margin-top: 10px;
            padding: 11px;
            border: 1px solid #ffffff70;
            border-radius: 8px;
            background: transparent;
            color: white;
            cursor: pointer;
        }

        .main {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 27px;
            margin: 0 0 8px;
        }

        h2 {
            font-size: 19px;
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

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .card,
        .section {
            background: white;
            border-radius: 12px;
            padding: 22px;
            box-shadow: 0 3px 15px #20253608;
        }

        .number {
            font-size: 27px;
            font-weight: bold;
            margin: 12px 0;
            color: #a91634;
        }

        .section {
            margin-top: 22px;
        }

        .form-control {
            width: 100%;
            padding: 11px;
            border: 1px solid #ddd;
            border-radius: 7px;
            margin-top: 7px;
            margin-bottom: 15px;
            font-family: inherit;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-primary {
            background: #a91634;
            color: white;
        }

        .btn-edit {
            background: #fff0d6;
            color: #a56800;
        }

        .btn-delete {
            background: #ffe1e4;
            color: #b42336;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th, td {
            padding: 13px;
            text-align: left;
            border-bottom: 1px solid #eee;
            font-size: 13px;
        }

        th {
            background: #f7f7f9;
        }

        .alert {
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 18px;
            background: #e6f7eb;
            color: #18733b;
        }

        .alert-error {
            background: #ffe5e7;
            color: #b42336;
        }

        .photo {
            width: 90px;
            height: 65px;
            object-fit: cover;
            border-radius: 7px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
        }

        .gallery-card {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 12px;
            min-width: 0;
        }

        .gallery-card img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            border-radius: 8px;
        }

        @media(max-width: 1050px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .gallery {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .cards,
            .gallery,
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="brand">RW 04</div>
    <div class="subtitle">Panel Administrasi</div>

    <div class="menu-title">Menu Utama</div>

    <a href="{{ route('admin.dashboard') }}"
       class="menu {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        ▦ Dashboard
    </a>

    <a href="/admin/warga" class="menu">♙ Data Warga</a>

    <a href="{{ route('admin.kas.index') }}"
       class="menu {{ request()->routeIs('admin.kas.*') ? 'active' : '' }}">
        ▤ Kas RW
    </a>

    <div class="menu-title">Konten Website</div>

    <a href="/admin/berita" class="menu">▣ Berita</a>
    <a href="/admin/pengumuman" class="menu">⚑ Pengumuman</a>
    <a href="/admin/agenda" class="menu">▦ Agenda Kegiatan</a>
    <a href="/admin/layanan" class="menu">◇ Layanan Warga</a>

    <a href="{{ route('admin.jadwal-ronda.index') }}"
       class="menu {{ request()->routeIs('admin.jadwal-ronda.*') ? 'active' : '' }}">
        ◷ Jadwal Ronda
    </a>

    <div class="menu-title">Lainnya</div>

    <a href="{{ route('beranda') }}" class="menu">
        ↗ Lihat Website
    </a>

    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button class="logout" type="submit">Logout</button>
    </form>

</aside>

<main class="main">

    @yield('content')

</main>

</body>
</html>
