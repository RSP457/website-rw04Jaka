
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengurus RT | RW 04 Jatinegara Kaum</title>

    <style>
        :root {
            --red: #c51e3a;
            --dark-red: #811529;
            --soft-red: #fff0f2;
            --border: #f0dce0;
            --text: #252b36;
            --muted: #6b7280;
            --background: #faf6f7;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: var(--text);
            background: var(--background);
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
        }

        .rt-page {
            width: calc(100% - 48px);
            max-width: 1500px;
            margin: auto;
            padding-bottom: 65px;
        }

        /* HEADER */
        .rt-hero {
            padding: 52px 0 45px;
            margin-bottom: 40px;
        }

        .rt-hero .eyebrow {
            display: inline-block;
            padding: 6px 14px;
            margin-bottom: 12px;
            border-radius: 30px;
            background: var(--soft-red);
            color: var(--red);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .rt-hero h1 {
            margin: 0 0 12px;
            color: var(--dark-red);
            font-size: clamp(32px, 4vw, 48px);
            line-height: 1.2;
        }

        .rt-hero p {
            max-width: 760px;
            margin: 0;
            color: var(--muted);
            font-size: 15px;
        }

        /* RINGKASAN */
        .rt-summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 38px;
        }

        .summary-card {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 23px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 5px 20px rgba(80, 20, 30, .035);
        }

        .summary-icon {
            display: flex;
            width: 52px;
            height: 52px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: var(--soft-red);
            color: var(--red);
            font-size: 23px;
            font-weight: 800;
        }

        .summary-label {
            color: var(--muted);
            font-size: 12px;
        }

        .summary-value {
            color: var(--dark-red);
            font-size: 22px;
            font-weight: 800;
        }

        /* JUDUL DAFTAR */
        .rt-section-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .rt-section-heading h2 {
            margin: 0;
            color: var(--dark-red);
            font-size: 28px;
        }

        .rt-section-heading p {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .period-badge {
            padding: 8px 14px;
            flex-shrink: 0;
            border: 1px solid var(--border);
            border-radius: 30px;
            background: #fff;
            color: var(--red);
            font-size: 12px;
            font-weight: 700;
        }

        /* GRID RT LEBAR */
        .rt-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .rt-card {
            min-width: 0;
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 7px 22px rgba(80, 20, 30, .035);
            transition: transform .2s, box-shadow .2s;
        }

        .rt-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 13px 28px rgba(80, 20, 30, .09);
        }

        .rt-card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f1e5e7;
        }

        .rt-number {
            display: flex;
            width: 57px;
            height: 57px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: var(--red);
            color: white;
            font-size: 19px;
            font-weight: 800;
        }

        .rt-card-header h3 {
            margin: 0;
            color: var(--dark-red);
            font-size: 21px;
        }

        .rt-card-header p {
            margin: 2px 0 0;
            color: var(--muted);
            font-size: 12px;
        }

        /* DAFTAR PENGURUS */
        .officer-list {
            display: flex;
            flex-direction: column;
            gap: 21px;
            padding-top: 22px;
        }

        .officer {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            min-width: 0;
        }

        .officer-icon {
            display: flex;
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: var(--soft-red);
            color: var(--red);
            font-size: 17px;
            font-weight: 800;
        }

        .officer-info {
            min-width: 0;
        }

        .officer-role {
            display: block;
            margin-bottom: 3px;
            color: #77717a;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .officer-name {
            margin: 0;
            color: #303746;
            font-size: 16px;
            font-weight: 600;
            line-height: 1.45;
            overflow-wrap: anywhere;
        }

        /* INFORMASI BAWAH */
        .rt-note {
            margin-top: 30px;
            padding: 19px 22px;
            border-left: 4px solid #e0b34f;
            border-radius: 8px;
            background: #fff;
            color: var(--muted);
            font-size: 13px;
        }

        .rt-note strong {
            color: var(--dark-red);
        }

        /* TABLET */
        @media (max-width: 1050px) {
            .rt-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .rt-summary {
                gap: 12px;
            }

            .summary-card {
                padding: 16px;
            }
        }

        /* HP */
        @media (max-width: 650px) {
            .rt-page {
                width: calc(100% - 28px);
            }

            .rt-hero {
                padding-top: 32px;
                margin-bottom: 25px;
            }

            .rt-summary {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .rt-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .rt-section-heading {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }

            .rt-section-heading h2 {
                font-size: 24px;
            }

            .rt-card {
                padding: 22px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .rt-card {
                transition: none;
            }
        }
    </style>
</head>

<body>

@include('templates.navbar')

@php
    /*
     * GANTI NAMA CONTOH DI BAWAH DENGAN DATA RESMI.
     * Data ini belum merupakan daftar pengurus yang terverifikasi.
     */
    $rtList = [
        [
            'nomor' => '001',
            'ketua' => 'Agus Sunaryo',
            'sekretaris' => 'Suheri',
            'bendahara' => 'Endah',
        ],
        [
            'nomor' => '002',
            'ketua' => 'Nurhadi',
            'sekretaris' => 'Joko Restiawan',
            'bendahara' => 'Dwi Wulandari',
        ],
        [
            'nomor' => '003',
            'ketua' => 'Syaiful Basri',
            'sekretaris' => 'Norman Harvy',
            'bendahara' => 'Irsan',
        ],
        [
            'nomor' => '004',
            'ketua' => 'Marlan',
            'sekretaris' => 'Muchlis',
            'bendahara' => 'Bambang Harun',
        ],
        [
            'nomor' => '005',
            'ketua' => 'Suherlan',
            'sekretaris' => 'Ary Nurshandy Fauzi',
            'bendahara' => 'Erma',
        ],
        [
            'nomor' => '006',
            'ketua' => 'Aziz Muslim',
            'sekretaris' => 'Dapar',
            'bendahara' => 'Nur Ratna Sari',
        ],
        [
            'nomor' => '007',
            'ketua' => 'Beta Efrana',
            'sekretaris' => 'Sarnubi',
            'bendahara' => 'Agus Suwawan',
        ],
        [
            'nomor' => '008',
            'ketua' => 'Lisni Tanjung',
            'sekretaris' => 'Hardi Winoko',
            'bendahara' => 'Djoko Purwanto',
        ],
        [
            'nomor' => '009',
            'ketua' => 'Khoir Firdaus',
            'sekretaris' => 'Arif Rachman',
            'bendahara' => 'Bambang Haryanto',
        ],
        [
            'nomor' => '010',
            'ketua' => 'Suryana',
            'sekretaris' => 'Wika Cristin',
            'bendahara' => 'Nurhidayatullah',
        ],
        [
            'nomor' => '011',
            'ketua' => 'Wawan Ridwan',
            'sekretaris' => 'Jabat Mardiansyah',
            'bendahara' => 'Rohimah',
        ],
    ];
@endphp

<main class="rt-page">

    {{-- HEADER HALAMAN --}}
    <header class="rt-hero">
        <span class="eyebrow">RW 04 JATINEGARA KAUM</span>

        <h1>Pengurus RT</h1>

        <p>
            Informasi struktur kepengurusan RT 01 sampai RT 11
            di wilayah RW 04 Jatinegara Kaum, Kelurahan Jatinegara
            Kaum, Kecamatan Pulogadung, Jakarta Timur.
        </p>
    </header>

    {{-- RINGKASAN --}}
    <section class="rt-summary">

        <article class="summary-card">
            <div class="summary-icon">11</div>
            <div>
                <div class="summary-label">Jumlah Wilayah</div>
                <div class="summary-value">11 RT</div>
            </div>
        </article>

        <article class="summary-card">
            <div class="summary-icon">3</div>
            <div>
                <div class="summary-label">Jabatan per RT</div>
                <div class="summary-value">3 Pengurus</div>
            </div>
        </article>

        <article class="summary-card">
            <div class="summary-icon">24</div>
            <div>
                <div class="summary-label">Masa Bakti</div>
                <div class="summary-value">2025-2030</div>
            </div>
        </article>

    </section>

    {{-- DAFTAR RT --}}
    <section id="daftar-rt">

        <div class="rt-section-heading">
            <div>
                <h2>Daftar Pengurus RT 01–11</h2>
                <p>
                    Ketua, sekretaris, dan bendahara pada setiap RT.
                </p>
            </div>

            <span class="period-badge">
                Masa Bakti 2025-2030
            </span>
        </div>

        <div class="rt-grid">

            @foreach ($rtList as $rt)
                <article class="rt-card">

                    <header class="rt-card-header">
                        <div class="rt-number">
                            {{ $rt['nomor'] }}
                        </div>

                        <div>
                            <h3>RT {{ $rt['nomor'] }}</h3>
                            <p>Pengurus Rukun Tetangga</p>
                        </div>
                    </header>

                    <div class="officer-list">

                        <div class="officer">
                            <div class="officer-icon">K</div>

                            <div class="officer-info">
                                <span class="officer-role">KETUA</span>
                                <h4 class="officer-name">
                                    {{ $rt['ketua'] }}
                                </h4>
                            </div>
                        </div>

                        <div class="officer">
                            <div class="officer-icon">S</div>

                            <div class="officer-info">
                                <span class="officer-role">SEKRETARIS</span>
                                <h4 class="officer-name">
                                    {{ $rt['sekretaris'] }}
                                </h4>
                            </div>
                        </div>

                        <div class="officer">
                            <div class="officer-icon">B</div>

                            <div class="officer-info">
                                <span class="officer-role">BENDAHARA</span>
                                <h4 class="officer-name">
                                    {{ $rt['bendahara'] }}
                                </h4>
                            </div>
                        </div>

                    </div>
                </article>
            @endforeach

        </div>

    </section>

    <aside class="rt-note">
        <strong>Informasi:</strong>
        Data nama pengurus pada halaman ini masih berupa placeholder.
        Silakan ganti dengan nama ketua, sekretaris, dan bendahara
        sesuai data resmi masing-masing RT.
    </aside>

</main>

@include('templates.footer')

</body>
</html>
