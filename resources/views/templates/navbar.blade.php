<style>
    .rw-navbar,
    .rw-navbar * {
        box-sizing: border-box;
    }

    .rw-navbar {
        position: sticky;
        top: 0;
        z-index: 9999;
        width: 100%;
        background: #ffffff;
        border-top: 3px solid #b51e36;
        border-bottom: 1px solid #eeeeee;
        font-family: Arial, Helvetica, sans-serif;
    }

    .rw-navbar a {
        text-decoration: none;
    }

    .rw-nav-container {
        width: min(1240px, calc(100% - 48px));
        min-height: 88px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 25px;
    }

    .rw-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-shrink: 0;
        color: #1f2937;
    }

    .rw-brand-logo {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #b51e36;
        color: #ffffff;
        border-radius: 14px;
        font-size: 24px;
        font-weight: 800;
    }

    .rw-brand-name {
        display: block;
        color: #1f2937;
        font-size: 15px;
        font-weight: 800;
        white-space: nowrap;
    }

    .rw-brand-desc {
        display: block;
        margin-top: 5px;
        color: #788397;
        font-size: 12px;
    }

    .rw-nav-menu {
        display: flex;
        align-items: center;
        gap: 24px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .rw-nav-menu > li {
        position: relative;
    }

    .rw-nav-link,
    .rw-dropdown-button {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 14px 0;
        border: none;
        background: transparent;
        color: #475569;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
        cursor: pointer;
        transition: color .2s;
    }

    .rw-nav-link:hover,
    .rw-dropdown-button:hover {
        color: #b51e36;
    }

    .rw-arrow {
        font-size: 11px;
        transition: transform .2s;
    }

    .rw-dropdown.open .rw-arrow {
        transform: rotate(180deg);
    }

    .rw-dropdown-menu {
        display: none;
        position: absolute;
        top: calc(100% + 2px);
        left: -18px;
        width: 290px;
        padding: 10px;
        background: #ffffff;
        border: 1px solid #f0f0f0;
        border-radius: 14px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, .12);
    }

    .rw-dropdown:hover > .rw-dropdown-menu,
    .rw-dropdown:focus-within > .rw-dropdown-menu,
    .rw-dropdown.open > .rw-dropdown-menu {
        display: block;
    }

    .rw-dropdown-item {
        display: block;
        padding: 13px 14px;
        border-radius: 9px;
        color: #1f2937 !important;
        transition: background .2s;
    }

    .rw-dropdown-item:hover {
        background: #fff1f2;
    }

    .rw-dropdown-item strong {
        display: block;
        font-size: 14px;
        font-weight: 600;
    }

    .rw-dropdown-item small {
        display: block;
        margin-top: 5px;
        color: #8992a2;
        font-size: 12px;
        line-height: 1.5;
    }

    .rw-nav-cta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 16px 21px;
        border-radius: 11px;
        background: #b51e36;
        color: #ffffff !important;
        font-size: 14px;
        font-weight: 700;
        white-space: nowrap;
        transition: background .2s;
    }

    .rw-nav-cta:hover {
        background: #94172c;
    }

    .rw-menu-toggle {
        display: none;
        width: 44px;
        height: 44px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        background: #ffffff;
        color: #1f2937;
        font-size: 23px;
        cursor: pointer;
    }

    @media (max-width: 1050px) {
        .rw-nav-container {
            gap: 15px;
        }

        .rw-nav-menu {
            gap: 13px;
        }

        .rw-brand-name {
            font-size: 13px;
        }

        .rw-brand-desc {
            font-size: 11px;
        }

        .rw-nav-cta {
            padding: 14px;
            font-size: 12px;
        }
    }

    @media (max-width: 850px) {
        .rw-nav-container {
            position: relative;
            width: calc(100% - 32px);
            min-height: 76px;
            gap: 12px;
        }

        .rw-brand-logo {
            width: 46px;
            height: 46px;
            font-size: 21px;
        }

        .rw-brand-name {
            font-size: 12px;
        }

        .rw-brand-desc {
            font-size: 10px;
        }

        .rw-menu-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-left: auto;
        }

        .rw-nav-cta {
            display: none;
        }

        .rw-nav-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: -16px;
            right: -16px;
            padding: 14px 20px 20px;
            align-items: stretch;
            flex-direction: column;
            gap: 0;
            background: #ffffff;
            border-top: 1px solid #eeeeee;
            border-bottom: 1px solid #eeeeee;
            box-shadow: 0 18px 30px rgba(15, 23, 42, .08);
        }

        .rw-nav-menu.show {
            display: flex;
        }

        .rw-nav-menu > li {
            width: 100%;
        }

        .rw-nav-link,
        .rw-dropdown-button {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 15px 8px;
            text-align: left;
        }

        .rw-dropdown-menu {
            position: static;
            width: 100%;
            padding: 5px 8px;
            border: none;
            border-radius: 8px;
            box-shadow: none;
            background: #fafafa;
        }

        .rw-dropdown:hover > .rw-dropdown-menu {
            display: none;
        }

        .rw-dropdown.open > .rw-dropdown-menu {
            display: block;
        }
    }

    @media (max-width: 380px) {
        .rw-nav-container {
            width: calc(100% - 22px);
        }

        .rw-brand {
            gap: 8px;
        }

        .rw-brand-name {
            font-size: 11px;
        }

        .rw-brand-desc {
            font-size: 9px;
        }
    }
</style>

<header class="rw-navbar">
    <nav class="rw-nav-container" aria-label="Navigasi utama">

        {{-- LOGO RW --}}
        <a href="{{ url('/') }}" class="rw-brand">
            <span class="rw-brand-logo">04</span>
            <span>
                <span class="rw-brand-name">RW 04 JATINEGARA KAUM</span>
                <span class="rw-brand-desc">Portal Informasi dan Layanan Warga</span>
            </span>
        </a>

        {{-- TOMBOL MENU MOBILE --}}
        <button
            type="button"
            class="rw-menu-toggle"
            aria-label="Buka navigasi"
            aria-expanded="false">
            ☰
        </button>

        {{-- MENU NAVIGASI --}}
        <ul class="rw-nav-menu">

            <li>
                <a href="{{ url('/#beranda') }}" class="rw-nav-link">
                    Beranda
                </a>
            </li>

            {{-- TENTANG KAMI --}}
            <li class="rw-dropdown">
                <button type="button"
                        class="rw-dropdown-button"
                        aria-expanded="false">
                    Tentang Kami <span class="rw-arrow">▾</span>
                </button>

                <div class="rw-dropdown-menu">
                    <a href="{{ url('/tentang/profil-rw') }}" class="rw-dropdown-item">
                        <strong>Profil</strong>
                        <small>Mengenal lingkungan dan wilayah RW 04</small>
                    </a>

                    <a href="{{ url('/tentang/struktur') }}" class="rw-dropdown-item">
                        <strong>Struktur RW</strong>
                        <small>Susunan pengurus dan tugasnya</small>

                    <a href="{{ url('/tentang/pengurus-rt') }}" class="rw-dropdown-item">
                        <strong>Pengurus RT</strong>
                        <small>Informasi wilayah RT di lingkungan RW 04</small>
                    </a>

                </div>
            </li>

            {{-- LAYANAN --}}
            <li class="rw-dropdown">
                <button type="button"
                        class="rw-dropdown-button"
                        aria-expanded="false">
                    Layanan <span class="rw-arrow">▾</span>
                </button>

                <div class="rw-dropdown-menu">
                    <a href="{{ url('/layanan/administrasi') }}" class="rw-dropdown-item">
                        <strong>Administrasi Warga</strong>
                        <small>Informasi surat dan kebutuhan administrasi</small>
                    </a>

                    <a href="{{ url('/layanan/pengaduan') }}" class="rw-dropdown-item">
                        <strong>Keamanan Wilayah</strong>
                        <small>Sampaikan kendala dan aspirasi lingkungan</small>
                    </a>

                    <a href="{{ url('/layanan/kegiatan') }}" class="rw-dropdown-item">
                        <strong>Kegiatan RW04</strong>
                        <small>Informasi kegiatan dan partisipasi warga</small>
                    </a>
                </div>
            </li>

            {{-- INFORMASI --}}
            <li class="rw-dropdown">
                <button type="button"
                        class="rw-dropdown-button"
                        aria-expanded="false">
                    Informasi <span class="rw-arrow">▾</span>
                </button>

                <div class="rw-dropdown-menu">
                    <a href="{{ url('/berita') }}" class="rw-dropdown-item">
                        <strong>Berita RW</strong>
                        <small>Kabar dan informasi terbaru lingkungan</small>
                    </a>

                    <a href="{{ url('/statistik-warga') }}" class="rw-dropdown-item">
                        <strong>Jumlah Warga per RT</strong>
                        <small>Ringkasan data penduduk setiap RT</small>
                    </a>

                    <a href="{{ url('/kas-rw') }}" class="rw-dropdown-item">
                        <strong>Kas RW</strong>
                        <small>Informasi pemasukan dan pengeluaran kas</small>
                    </a>
                </div>
            </li>

            {{-- AGENDA --}}
            <li>
                <a href="{{ url('/agenda') }}" class="rw-nav-link">
                    Agenda
                </a>
            </li>

            {{-- KONTAK --}}
            <li>
                <a href="{{ url('/kontak') }}" class="rw-nav-link">
                    Hubungi Kami
                </a>
            </li>
        </ul>


    </nav>
</header>

<script>
(function () {
    const navbar = document.querySelector('.rw-navbar');

    if (!navbar || navbar.dataset.initialized === 'true') return;
    navbar.dataset.initialized = 'true';

    const menuButton = navbar.querySelector('.rw-menu-toggle');
    const menu = navbar.querySelector('.rw-nav-menu');
    const dropdowns = navbar.querySelectorAll('.rw-dropdown');

    if (menuButton && menu) {
        menuButton.addEventListener('click', function () {
            const isOpen = menu.classList.toggle('show');

            menuButton.setAttribute('aria-expanded', String(isOpen));
            menuButton.innerHTML = isOpen ? '&times;' : '&#9776;';
        });
    }

    dropdowns.forEach(function (dropdown) {
        const button = dropdown.querySelector('.rw-dropdown-button');

        button.addEventListener('click', function (event) {
            event.stopPropagation();

            const isOpen = dropdown.classList.contains('open');

            dropdowns.forEach(function (item) {
                item.classList.remove('open');

                const itemButton = item.querySelector('.rw-dropdown-button');
                if (itemButton) {
                    itemButton.setAttribute('aria-expanded', 'false');
                }
            });

            if (!isOpen) {
                dropdown.classList.add('open');
                button.setAttribute('aria-expanded', 'true');
            }
        });
    });

    document.addEventListener('click', function (event) {
        if (!navbar.contains(event.target)) {
            dropdowns.forEach(function (dropdown) {
                dropdown.classList.remove('open');

                const button = dropdown.querySelector('.rw-dropdown-button');
                if (button) button.setAttribute('aria-expanded', 'false');
            });
        }
    });

    menu?.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            menu.classList.remove('show');
            menuButton?.setAttribute('aria-expanded', 'false');

            if (menuButton) menuButton.innerHTML = '&#9776;';
        });
    });
})();
</script>
```
