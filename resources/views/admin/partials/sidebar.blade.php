
<style>
    .sidebar {
        position: fixed;
        inset: 0 auto 0 0;
        width: 250px;
        background: #a91634;
        color: white;
        padding: 25px 18px;
        overflow-y: auto;
        z-index: 1000;
    }

    .sidebar .brand {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .sidebar .subtitle {
        font-size: 13px;
        opacity: .8;
        margin-bottom: 28px;
    }

    .sidebar .menu-title {
        font-size: 11px;
        text-transform: uppercase;
        opacity: .7;
        margin: 24px 10px 8px;
    }

    .sidebar .menu {
        display: block;
        color: white;
        text-decoration: none;
        padding: 12px;
        border-radius: 8px;
        margin: 4px 0;
        transition: .2s;
    }

    .sidebar .menu:hover,
    .sidebar .menu.active {
        background: #ffffff25;
    }

    .sidebar .logout {
        width: 100%;
        margin-top: 10px;
        padding: 11px;
        border: 1px solid #ffffff70;
        border-radius: 8px;
        background: transparent;
        color: white;
        cursor: pointer;
        font-size: 14px;
    }

    .sidebar .logout:hover {
        background: #ffffff20;
    }

    @media(max-width: 700px) {
        .sidebar {
            position: relative;
            width: 100%;
        }
    }
</style>

<aside class="sidebar">

    <!-- BRAND -->
    <div class="brand">RW 04</div>
    <div class="subtitle">Panel Administrasi</div>

    <!-- MENU UTAMA -->
    <div class="menu-title">Menu Utama</div>

    <a class="menu {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
       href="{{ route('admin.dashboard') }}">
        ▦ Dashboard
    </a>

    <a class="menu {{ request()->is('admin/warga*') ? 'active' : '' }}"
       href="/admin/data-warga">
        ♙ Data Warga
    </a>

    <a class="menu {{ request()->routeIs('admin.kas.*') ? 'active' : '' }}"
       href="{{ route('admin.kas.index') }}">
        ▤ Kas RW
    </a>

    <!-- KONTEN WEBSITE -->
    <div class="menu-title">Konten Website</div>

    <a class="menu {{ request()->is('admin/berita*') ? 'active' : '' }}"
       href="/admin/berita">
        ▣ Berita
    </a>

    <a class="menu {{ request()->is('admin/pengumuman*') ? 'active' : '' }}"
       href="/admin/pengumuman">
        ⚑ Pengumuman
    </a>

    <a class="menu {{ request()->is('admin/agenda*') ? 'active' : '' }}"
       href="/admin/agenda">
        ▦ Agenda Kegiatan
    </a>

    <a class="menu {{ request()->is('admin/layanan*') ? 'active' : '' }}"
       href="/admin/layanan">
        ◇ Layanan Warga
    </a>

    <!-- JADWAL RONDA -->
    <a class="menu {{ request()->routeIs('admin.jadwal-ronda.*') ? 'active' : '' }}"
       href="{{ route('admin.jadwal-ronda.index') }}">
        ◷ Jadwal Ronda
    </a>

    <!-- LAINNYA -->
    <div class="menu-title">Lainnya</div>

    <a class="menu" href="{{ route('beranda') }}">
        ↗ Lihat Website
    </a>

    <!-- LOGOUT -->
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf

        <button class="logout" type="submit">
            Logout
        </button>
    </form>

</aside>
