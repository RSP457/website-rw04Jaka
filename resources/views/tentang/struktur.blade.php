
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Struktur Organisasi RW 04 | Jatinegara Kaum</title>

    <style>
        :root {
            --red: #c51e3a;
            --dark-red: #761321;
            --deep-red: #991b2e;
            --light-red: #fff0f2;
            --border: #f0d8dd;
            --text: #252b36;
            --muted: #687386;
            --background: #faf6f7;
            --white: #ffffff;
            --gold: #e0b34f;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--background);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
        }

        /* AREA KONTEN DIPERLEBAR */
        .structure-container {
            width: calc(100% - 48px);
            max-width: 1500px;
            margin: 0 auto;
            padding: 42px 0 65px;
        }

        /* BANNER JUDUL */
        .hero {
            position: relative;
            overflow: hidden;
            margin-bottom: 48px;
            padding: 50px 25px;
            border-radius: 22px;
            background: linear-gradient(
                135deg,
                var(--dark-red),
                var(--deep-red)
            );
            color: white;
            text-align: center;
            box-shadow: 0 15px 35px rgba(121, 20, 33, .12);
        }

        .hero::before,
        .hero::after {
            position: absolute;
            width: 190px;
            height: 190px;
            content: "";
            border: 1px solid rgba(255,255,255,.13);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero::before {
            top: -100px;
            left: -55px;
        }

        .hero::after {
            right: -60px;
            bottom: -120px;
        }

        .hero-label {
            display: inline-block;
            padding: 7px 17px;
            border: 1px solid rgba(255,255,255,.3);
            border-radius: 30px;
            background: rgba(255,255,255,.10);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .hero h1 {
            margin: 16px 0 12px;
            color: #fff;
            font-size: clamp(28px, 4vw, 43px);
            line-height: 1.25;
        }

        .hero p {
            max-width: 850px;
            margin: 0 auto;
            color: #fff0f1;
            font-size: 15px;
        }

        .hero-line {
            width: 78px;
            height: 4px;
            margin: 24px auto 0;
            border-radius: 5px;
            background: var(--gold);
        }

        /* SETIAP BAGIAN */
        .structure-section {
            margin-bottom: 58px;
            scroll-margin-top: 110px;
        }

        .section-heading {
            margin: 0 auto 30px;
            text-align: center;
        }

        .section-eyebrow {
            display: block;
            margin-bottom: 8px;
            color: var(--red);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2.5px;
            text-transform: uppercase;
        }

        .section-heading h2 {
            margin: 0;
            color: var(--dark-red);
            font-size: clamp(24px, 3vw, 32px);
            line-height: 1.3;
        }

        .section-description {
            max-width: 760px;
            margin: 12px auto 0;
            color: var(--muted);
            font-size: 14px;
        }

        /* KARTU PENGURUS */
        .person-card {
            min-width: 0;
            padding: 26px 20px;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: var(--white);
            text-align: center;
            box-shadow: 0 8px 24px rgba(85, 25, 35, .045);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .person-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 30px rgba(85, 25, 35, .09);
        }

        .avatar {
            display: flex;
            width: 64px;
            height: 64px;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            border: 1px solid #f4c8cf;
            border-radius: 50%;
            background: var(--light-red);
            color: var(--red);
            font-size: 25px;
            font-weight: 800;
        }

        .person-role {
            margin-bottom: 5px;
            color: var(--red);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .7px;
            text-transform: uppercase;
        }

        .person-name {
            margin: 0;
            color: var(--text);
            font-size: 17px;
            font-weight: 700;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        /* KETUA RW */
        .chairman-wrap {
            display: flex;
            justify-content: center;
        }

        .chairman-card {
            width: min(400px, 100%);
            padding: 30px 22px;
            border: 2px solid var(--gold);
            border-radius: 20px;
            background: linear-gradient(
                145deg,
                var(--dark-red),
                var(--deep-red)
            );
            color: white;
            text-align: center;
            box-shadow: 0 12px 28px rgba(121, 20, 33, .12);
        }

        .chairman-card .avatar {
            width: 72px;
            height: 72px;
            border-color: var(--gold);
            background: white;
            color: var(--red);
        }

        .chairman-card .person-role,
        .chairman-card .person-name {
            color: white;
        }

        .chairman-card .person-name {
            font-size: 21px;
        }

        .connector {
            width: 2px;
            height: 34px;
            margin: 0 auto;
            background: #f7f8fc;
        }

        .core-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
            width: min(900px, 100%);
            margin: 0 auto;
        }

        /* LMK DI TENGAH, SETELAH PENGURUS RW */
        .lmk-section {
            margin-top: 0;
        }

        .lmk-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: stretch;
            gap: 24px;
        }

        .lmk-card {
            flex: 0 1 380px;
            width: min(380px, 100%);
            border-top: 4px solid var(--gold);
        }

        /* KOORDINATOR BIDANG */
        .coordinator-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .coordinator-card {
            padding: 28px 22px;
        }

        .field-icon {
            display: flex;
            width: 56px;
            height: 56px;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            border-radius: 15px;
            background: var(--light-red);
            font-size: 26px;
        }

        .field-number {
            display: inline-block;
            margin-bottom: 14px;
            padding: 5px 13px;
            border-radius: 20px;
            background: var(--light-red);
            color: var(--red);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .coordinator-card .person-name {
            font-size: 16px;
        }

        .coordinator-label {
            display: block;
            margin-top: 16px;
            padding-top: 13px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .coordinator-name {
            margin-top: 5px;
            color: var(--red);
            font-size: 16px;
        }

        /* RT: LEBAR PENUH DARI KIRI KE KANAN */
        .rt-section {
            width: 100%;
        }

        .rt-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
            width: 100%;
            margin: 0;
        }

        .rt-card {
            display: flex;
            min-height: 190px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 25px 18px;
            border-bottom: 3px solid var(--red);
        }

        .rt-number {
            display: flex;
            width: 54px;
            height: 54px;
            align-items: center;
            justify-content: center;
            margin: 0 auto 13px;
            border-radius: 15px;
            background: var(--red);
            color: white;
            font-size: 18px;
            font-weight: 800;
        }

        .rt-card .person-role {
            margin-bottom: 7px;
        }

        .rt-card .person-name {
            font-size: 16px;
        }

        .page-note {
            padding: 18px 22px;
            border-left: 4px solid var(--gold);
            border-radius: 9px;
            background: white;
            color: var(--muted);
            font-size: 13px;
        }

        /* TABLET */
        @media (max-width: 1000px) {
            .coordinator-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .rt-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        /* HP */
        @media (max-width: 600px) {
            .structure-container {
                width: calc(100% - 24px);
                padding-top: 25px;
            }

            .hero {
                padding: 38px 18px;
                border-radius: 18px;
            }

            .core-grid,
            .coordinator-grid {
                grid-template-columns: 1fr;
            }

            .lmk-grid {
                flex-direction: column;
                align-items: center;
            }

            .lmk-card {
                flex-basis: auto;
                width: 100%;
                max-width: 420px;
            }

            .rt-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .rt-card {
                min-height: 165px;
                padding: 20px 12px;
            }

            .person-card {
                padding: 22px 15px;
            }

            .section-heading h2 {
                font-size: 24px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            .person-card {
                transition: none;
            }
        }
    </style>
</head>

<body>

@include('templates.navbar')

@php
    $ketua = [
        'nama' => 'Supriyono, S.H.',
        'jabatan' => 'Ketua Rukun Warga',
        'inisial' => 'K',
    ];

    $pengurusInti = [
        [
            'nama' => 'Ruswan',
            'jabatan' => 'Sekretaris RW',
            'inisial' => 'S',
        ],
        [
            'nama' => 'Eddy Suharyanto',
            'jabatan' => 'Bendahara RW',
            'inisial' => 'B',
        ],
    ];

    $lmk = [
        [
            'nama' => 'Nurcholis',
            'jabatan' => 'Anggota LMK',
            'inisial' => 'N',
        ],
    ];

    $bidang = [
        [
            'nomor' => '01',
            'ikon' => '🛡️',
            'nama' => 'Keamanan dan Ketertiban',
            'koordinator' => 'Dewi Lestari',
        ],
        [
            'nomor' => '02',
            'ikon' => '🌿',
            'nama' => 'Kebersihan dan Lingkungan',
            'koordinator' => 'Rizky Pratama',
        ],
        [
            'nomor' => '03',
            'ikon' => '🤝',
            'nama' => 'Sosial dan Kemasyarakatan',
            'koordinator' => 'Hendra Wijaya',
        ],
        [
            'nomor' => '04',
            'ikon' => '📋',
            'nama' => 'Administrasi dan Data Warga',
            'koordinator' => 'Nama Koordinator 04',
        ],
        [
            'nomor' => '05',
            'ikon' => '🎉',
            'nama' => 'Pemuda dan Kegiatan',
            'koordinator' => 'Nama Koordinator 05',
        ],
        [
            'nomor' => '06',
            'ikon' => '🏗️',
            'nama' => 'Pembangunan dan Sarana',
            'koordinator' => 'Nama Koordinator 06',
        ],
    ];

    /*
     * Nama berikut adalah CONTOH.
     * Ganti dengan nama ketua RT resmi RW 04.
     */
    $rtList = [
        ['nomor' => '01', 'nama' => 'Agus Sunaryo'],
        ['nomor' => '02', 'nama' => 'Nurhadi'],
        ['nomor' => '03', 'nama' => 'Syaiful Basri'],
        ['nomor' => '04', 'nama' => 'Marlan'],
        ['nomor' => '05', 'nama' => 'Suherlan'],
        ['nomor' => '06', 'nama' => 'Aziz Muslim'],
        ['nomor' => '07', 'nama' => 'Beta Efrana'],
        ['nomor' => '08', 'nama' => 'Lisni Tanjung'],
        ['nomor' => '09', 'nama' => 'Khoir Firdaus'],
        ['nomor' => '10', 'nama' => 'Suryana'],
        ['nomor' => '11', 'nama' => 'Wawan Ridwan'],
    ];
@endphp

<main class="structure-container">

    {{-- JUDUL UTAMA --}}
    <header class="hero">
        <span class="hero-label">
            Pemerintahan dan Kemasyarakatan
        </span>

        <h1>Struktur Organisasi RW 04</h1>

        <p>
            RW 04 Jatinegara Kaum, Kelurahan Jatinegara Kaum,
            Kecamatan Pulogadung, Jakarta Timur. Bersama membangun
            lingkungan yang aman, tertib, nyaman, dan harmonis.
        </p>

        <div class="hero-line"></div>
    </header>

    {{-- PENGURUS RW --}}
    <section class="structure-section" id="pengurus-rw">

        <div class="section-heading">
            <span class="section-eyebrow">Pengurus Wilayah</span>
            <h2>Pengurus RW 04</h2>
        </div>

        <div class="chairman-wrap">
            <article class="chairman-card">
                <div class="avatar">
                    {{ $ketua['inisial'] }}
                </div>

                <div class="person-role">
                    {{ $ketua['jabatan'] }}
                </div>

                <h3 class="person-name">
                    {{ $ketua['nama'] }}
                </h3>
            </article>
        </div>

        <div class="connector"></div>

        <div class="core-grid">
            @foreach ($pengurusInti as $pengurus)
                <article class="person-card">
                    <div class="avatar">
                        {{ $pengurus['inisial'] }}
                    </div>

                    <div class="person-role">
                        {{ $pengurus['jabatan'] }}
                    </div>

                    <h3 class="person-name">
                        {{ $pengurus['nama'] }}
                    </h3>
                </article>
            @endforeach
        </div>

    </section>

    {{-- LMK SETELAH PENGURUS RW --}}
    <section class="structure-section lmk-section" id="lmk">

        <div class="section-heading">
            <span class="section-eyebrow">Unsur Kemasyarakatan</span>
            <h2>Lembaga Musyawarah Kelurahan (LMK)</h2>
        </div>

        <div class="lmk-grid">
            @foreach ($lmk as $anggota)
                <article class="person-card lmk-card">
                    <div class="avatar">
                        {{ $anggota['inisial'] }}
                    </div>

                    <div class="person-role">
                        {{ $anggota['jabatan'] }}
                    </div>

                    <h3 class="person-name">
                        {{ $anggota['nama'] }}
                    </h3>
                </article>
            @endforeach
        </div>

    </section>

    {{-- KOORDINATOR BIDANG --}}
    <section class="structure-section" id="koordinator">

        <div class="section-heading">
            <span class="section-eyebrow">Seksi dan Koordinator</span>
            <h2>Koordinator Bidang</h2>
            <p class="section-description">
                Koordinasi bidang untuk mendukung keamanan,
                kebersihan, pelayanan, dan kegiatan masyarakat RW 04.
            </p>
        </div>

        <div class="coordinator-grid">
            @foreach ($bidang as $item)
                <article class="person-card coordinator-card">

                    <div class="field-icon" aria-hidden="true">
                        {{ $item['ikon'] }}
                    </div>

                    <span class="field-number">
                        BIDANG {{ $item['nomor'] }}
                    </span>

                    <h3 class="person-name">
                        {{ $item['nama'] }}
                    </h3>

                    <span class="coordinator-label">
                        NAMA KOORDINATOR
                    </span>

                    <div class="person-name coordinator-name">
                        {{ $item['koordinator'] }}
                    </div>

                </article>
            @endforeach
        </div>

    </section>

    {{-- PENGURUS RT LEBAR PENUH --}}
    <section class="structure-section rt-section" id="pengurus-rt">

        <div class="section-heading">
            <span class="section-eyebrow">Koordinasi Wilayah</span>
            <h2>Pengurus RT 01–11</h2>
            <p class="section-description">
                Daftar ketua RT yang berada di wilayah RW 04
                Jatinegara Kaum.
            </p>
        </div>

        <div class="rt-grid">
            @foreach ($rtList as $rt)
                <article class="person-card rt-card">

                    <div class="rt-number">
                        {{ $rt['nomor'] }}
                    </div>

                    <div class="person-role">
                        Ketua RT {{ $rt['nomor'] }}
                    </div>

                    <h3 class="person-name">
                        {{ $rt['nama'] }}
                    </h3>

                </article>
            @endforeach
        </div>

    </section>

    <div class="page-note">
        <strong>Informasi:</strong>
        Nama ketua RT dan koordinator bidang harus disesuaikan
        dengan data resmi pengurus RW 04 Jatinegara Kaum.
    </div>

</main>

@include('templates.footer')

</body>
</html>
