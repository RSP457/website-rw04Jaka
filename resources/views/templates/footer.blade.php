<footer class="rw-footer">
    <div class="rw-footer-main">
        <div class="rw-footer-container">

            {{-- IDENTITAS RW --}}
            <div class="rw-footer-brand">
                <a href="{{ url('/') }}" class="rw-footer-logo">
                    <span class="rw-footer-logo-number">04</span>
                    <span class="rw-footer-brand-text">
                        <strong>RW 04 JATINEGARA KAUM</strong>
                        <small>Portal Informasi dan Layanan Warga</small>
                    </span>
                </a>

                <p class="rw-footer-description">
                    Bersama membangun lingkungan yang tertib, aman,
                    nyaman, dan harmonis melalui keterbukaan informasi
                    serta partisipasi seluruh warga RW 04.
                </p>

                <span class="rw-footer-badge">
                    <span class="rw-footer-status"></span>
                    Portal Informasi Warga
                </span>
            </div>

            {{-- NAVIGASI --}}
            <div class="rw-footer-column">
                <h3>Navigasi</h3>
                <ul>
                    <li><a href="{{ url('/') }}#beranda">Beranda</a></li>
                    <li><a href="{{ url('/') }}#tentang">Tentang Kami</a></li>
                    <li><a href="{{ url('/') }}#layanan">Layanan Warga</a></li>
                    <li><a href="{{ url('/') }}#berita">Informasi dan Berita</a></li>
                    <li><a href="{{ url('/') }}#agenda">Agenda Kegiatan</a></li>
                </ul>
            </div>

            {{-- LAYANAN --}}
            <div class="rw-footer-column">
                <h3>Layanan Warga</h3>
                <ul>
                    <li>
                        <a href="{{ url('/layanan/administrasi') }}">
                            Administrasi Warga
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/layanan/pengaduan') }}">
                            Pengaduan Lingkungan
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/layanan/kegiatan') }}">
                            Kegiatan Masyarakat
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/statistik-warga') }}">
                            Data Warga per RT
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/kas-rw') }}">
                            Informasi Kas RW
                        </a>
                    </li>
                </ul>
            </div>

            {{-- KONTAK --}}
            <div class="rw-footer-column rw-footer-contact">
                <h3>Hubungi Kami</h3>

                <div class="rw-footer-contact-item">
                    <span class="rw-footer-contact-icon">⌖</span>
                    <p>
                        RW 04 Jatinegara Kaum<br>
                        Pulogadung, Jakarta Timur
                    </p>
                </div>

                <div class="rw-footer-contact-item">
                    <span class="rw-footer-contact-icon">✉</span>
                    <p>
                        Silakan gunakan halaman kontak
                        untuk menyampaikan pesan kepada pengurus.
                    </p>
                </div>

                <a href="{{ url('/kontak') }}" class="rw-footer-contact-link">
                    Hubungi Pengurus <span>→</span>
                </a>
            </div>

        </div>
    </div>

    {{-- BAGIAN BAWAH --}}
    <div class="rw-footer-bottom">
        <div class="rw-footer-bottom-inner">
            <p>
                &copy; {{ date('Y') }}
                <strong>RW 04 Jatinegara Kaum</strong>.
                Hak cipta dilindungi.
            </p>

            <p class="rw-footer-credit">
                Portal Informasi dan Layanan Warga
            </p>
        </div>
    </div>
</footer>

<style>
.rw-footer {
    --footer-red: #b51e36;
    --footer-dark: #171f2d;
    --footer-muted: #9ca8ba;

    color: #fff;
    background: var(--footer-dark);
    font-family: inherit;
}

.rw-footer * {
    box-sizing: border-box;
}

.rw-footer-main {
    padding: 65px 24px 55px;
}

.rw-footer-container {
    width: min(1240px, 100%);
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.5fr 1fr 1.2fr 1.25fr;
    gap: 42px;
}

.rw-footer-brand {
    min-width: 0;
}

.rw-footer-logo {
    display: flex;
    align-items: center;
    gap: 13px;
    color: #fff;
    text-decoration: none;
}

.rw-footer-logo-number {
    display: grid;
    place-items: center;
    width: 55px;
    height: 55px;
    flex-shrink: 0;
    border-radius: 14px;
    background: var(--footer-red);
    color: #fff;
    font-size: 23px;
    font-weight: 800;
}

.rw-footer-brand-text {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.rw-footer-brand-text strong {
    font-size: 14px;
    line-height: 1.5;
}

.rw-footer-brand-text small {
    color: var(--footer-muted);
    font-size: 11px;
    line-height: 1.6;
}

.rw-footer-description {
    max-width: 340px;
    margin: 24px 0 20px;
    color: var(--footer-muted);
    font-size: 13px;
    line-height: 1.9;
}

.rw-footer-badge {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 9px 12px;
    border: 1px solid #354052;
    border-radius: 30px;
    color: #d8e0eb;
    font-size: 11px;
}

.rw-footer-status {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #4ade80;
}

.rw-footer-column h3 {
    position: relative;
    margin: 7px 0 25px;
    padding-bottom: 14px;
    color: #fff;
    font-size: 15px;
    font-weight: 750;
}

.rw-footer-column h3::after {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 32px;
    height: 3px;
    border-radius: 5px;
    background: var(--footer-red);
    content: "";
}

.rw-footer-column ul {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.rw-footer-column ul a {
    color: var(--footer-muted);
    font-size: 12px;
    line-height: 1.7;
    text-decoration: none;
    transition: color .2s;
}

.rw-footer-column ul a:hover {
    color: #fff;
}

.rw-footer-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 19px;
}

.rw-footer-contact-icon {
    display: grid;
    place-items: center;
    width: 34px;
    height: 34px;
    flex-shrink: 0;
    border-radius: 9px;
    background: #2a3343;
    color: #ff8497;
    font-size: 18px;
}

.rw-footer-contact-item p {
    margin: 2px 0 0;
    color: var(--footer-muted);
    font-size: 12px;
    line-height: 1.8;
}

.rw-footer-contact-link {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    margin-top: 4px;
    padding: 12px 15px;
    border-radius: 8px;
    background: var(--footer-red);
    color: #fff;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
    transition: background .2s;
}

.rw-footer-contact-link:hover {
    background: #94172c;
}

.rw-footer-bottom {
    border-top: 1px solid #303a4b;
    padding: 22px 24px;
}

.rw-footer-bottom-inner {
    width: min(1240px, 100%);
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.rw-footer-bottom p {
    margin: 0;
    color: var(--footer-muted);
    font-size: 11px;
    line-height: 1.8;
}

.rw-footer-bottom strong {
    color: #fff;
}

@media (max-width: 1000px) {
    .rw-footer-container {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 40px 30px;
    }
}

@media (max-width: 600px) {
    .rw-footer-main {
        padding: 45px 20px 35px;
    }

    .rw-footer-container {
        grid-template-columns: 1fr;
        gap: 34px;
    }

    .rw-footer-description {
        max-width: 100%;
    }

    .rw-footer-column h3 {
        margin-bottom: 20px;
    }

    .rw-footer-bottom {
        padding: 20px;
    }

    .rw-footer-bottom-inner {
        align-items: flex-start;
        flex-direction: column;
        gap: 8px;
    }
}
</style>
