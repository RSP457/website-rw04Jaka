
@include('templates.navbar')

<style>
    /* STICKY FOOTER */
    html, body {
        min-height: 100%;
        margin: 0;
    }

    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .security-page {
        flex: 1 0 auto;
        width: 100%;
        background: #f5f6f9;
        color: #263044;
    }

    /* SEMUA JUDUL MERAH */
    .security-page h1,
    .security-page h2,
    .security-page h3 {
        color: #b3193a;
    }

    /* HERO */
    .security-hero {
        background: #fff;
        padding: 95px 5% 75px;
        border-radius: 0 0 30px 30px;
    }

    .security-hero h1 {
        font-size: clamp(42px, 6vw, 68px);
        font-weight: 600;
        letter-spacing: -2px;
        margin: 0 0 20px;
        text-align: left;
    }

    .security-hero p {
        color: #64748b;
        font-size: 17px;
        line-height: 1.8;
        margin: 0;
    }

    .security-container {
        max-width: 1450px;
        width: 90%;
        margin: auto;
    }

    .security-section {
        padding: 70px 0;
    }

    .security-heading {
        font-size: 36px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .security-description {
        color: #596579;
        font-size: 16px;
        line-height: 1.9;
        margin-bottom: 18px;
    }

    /* INTRO PETUGAS */
    .staff-intro {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 45px;
        align-items: center;
        margin-bottom: 55px;
    }

    .staff-photo-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .staff-photo-grid img {
        width: 100%;
        height: 210px;
        object-fit: cover;
        border-radius: 7px;
    }

    /* KARTU PETUGAS */
    .staff-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .staff-card {
        background: white;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,.05);
        text-align: center;
        transition: .3s;
    }

    .staff-card:hover {
        transform: translateY(-5px);
    }

    .staff-card img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        display: block;
    }

    .staff-card-content {
        padding: 22px 15px;
    }

    .staff-card h3 {
        font-size: 18px;
        font-weight: 700;
        margin: 0 0 12px;
    }

    .staff-role {
        display: inline-block;
        background: #fde8ed;
        color: #b3193a;
        border-radius: 30px;
        padding: 8px 16px;
        font-size: 12px;
        font-weight: 600;
    }

    .staff-placeholder {
        height: 260px;
        background: #fde8ed;
        display: none;
        align-items: center;
        justify-content: center;
        color: #b3193a;
        font-size: 50px;
        font-weight: 700;
    }

    /* INFORMASI PATROLI */
    .patrol-information {
        background: #fff;
        border-left: 5px solid #b3193a;
        padding: 28px 30px;
        margin-top: 35px;
        border-radius: 8px;
        box-shadow: 0 5px 20px rgba(0,0,0,.035);
    }

    .patrol-information h3 {
        font-size: 22px;
        margin-bottom: 15px;
    }

    .patrol-information p {
        color: #596579;
        font-size: 15px;
        line-height: 1.9;
        margin: 0;
    }

    /* JADWAL */
    .schedule-section {
        padding: 10px 0 75px;
    }

    .schedule-wrapper {
        background: #fff;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,.035);
        overflow-x: auto;
    }

    .schedule-table {
        width: 100%;
        min-width: 650px;
        border-collapse: collapse;
    }

    .schedule-table th {
        background: #b3193a;
        color: white;
        padding: 16px;
        text-align: left;
    }

    .schedule-table td {
        padding: 17px 16px;
        border-bottom: 1px solid #eee;
        color: #344054;
        font-size: 14px;
    }

    .schedule-table tbody tr:hover {
        background: #fff7f8;
    }

    .rt-label {
        background: #fde8ed;
        color: #b3193a;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
    }

    .empty-schedule {
        text-align: center;
        padding: 30px !important;
        color: #8490a3 !important;
    }

    /* DOKUMENTASI FOTO TANPA KARTU */
    .documentation-section {
        padding: 10px 0 70px;
    }

    .documentation-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
    }

    .documentation-grid img {
        width: 100%;
        height: 270px;
        object-fit: cover;
        border-radius: 6px;
        display: block;
        transition: .3s;
    }

    .documentation-grid img:hover {
        transform: scale(1.02);
    }

    .documentation-empty {
        color: #8490a3;
        padding: 15px 0;
    }

    /* FOOTER SELALU DI BAWAH */
    footer {
        flex-shrink: 0;
    }

    /* RESPONSIVE */
    @media(max-width: 900px) {
        .staff-intro {
            grid-template-columns: 1fr;
        }

        .staff-list {
            grid-template-columns: repeat(2, 1fr);
        }

        .documentation-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width: 550px) {
        .security-hero {
            padding: 70px 6% 55px;
        }

        .security-hero h1 {
            font-size: 40px;
        }

        .security-container {
            width: 90%;
        }

        .security-section {
            padding: 45px 0;
        }

        .security-heading {
            font-size: 29px;
        }

        .staff-list,
        .documentation-grid {
            grid-template-columns: 1fr;
        }

        .staff-photo-grid img {
            height: 150px;
        }

        .documentation-grid img {
            height: 230px;
        }

        .patrol-information {
            padding: 20px;
        }
    }
</style>

<div class="security-page">

    {{-- HERO --}}
    <section class="security-hero">
        <h1>Keamanan Wilayah RW 04</h1>
        <p>
            Perangkat pengamanan wilayah RW 04 Jatinegara Kaum
        </p>
    </section>

    <div class="security-container">

        {{-- PETUGAS KEAMANAN --}}
        <section class="security-section">

            <div class="staff-intro">

                <div>
                    <h2 class="security-heading">
                        Petugas Keamanan
                    </h2>

                    <p class="security-description">
                        Keamanan wilayah RW 04 Jatinegara Kaum
                        dijaga oleh petugas keamanan yang memiliki
                        tanggung jawab dalam menjaga ketertiban,
                        kenyamanan, dan keamanan lingkungan.
                    </p>

                    <p class="security-description">
                        Petugas keamanan melaksanakan kegiatan
                        penjagaan, pemantauan lingkungan, patroli
                        wilayah, serta membantu warga apabila
                        terjadi gangguan keamanan atau keadaan
                        yang membutuhkan penanganan.
                    </p>

                    <p class="security-description">
                        Kegiatan patroli dilakukan dengan berkeliling
                        ke seluruh wilayah RW 04, termasuk memantau
                        jalan lingkungan, akses masuk permukiman,
                        fasilitas umum, dan titik-titik yang dianggap
                        perlu mendapatkan perhatian khusus.
                    </p>
                </div>

                <div class="staff-photo-grid">
                    @foreach([
                        'ahmad.jpg',
                        'budi.jpg',
                        'dedi.jpg',
                        'agus.jpg'
                    ] as $foto)

                        <img
                            src="{{ asset('images/petugas/'.$foto) }}"
                            alt="Petugas keamanan RW 04"
                            loading="lazy"
                            onerror="this.style.display='none'"
                        >

                    @endforeach
                </div>

            </div>

            {{-- LIMA PETUGAS --}}
            <h2 class="security-heading">
                Daftar Petugas Keamanan RW 04
            </h2>

            <p class="security-description" style="margin-bottom:30px;">
                Berikut merupakan petugas yang membantu menjaga
                keamanan dan ketertiban lingkungan RW 04.
            </p>

            @php
                $petugas = [
                    [
                        'nama' => 'Muhammad Adi',
                        'jabatan' => 'Koordinator Keamanan',
                        'foto' => 'ahmad.jpg',
                        'inisial' => 'MA'
                    ],
                    [
                        'nama' => 'Andi Suwandi',
                        'jabatan' => 'Petugas Keamanan',
                        'foto' => 'budi.jpg',
                        'inisial' => 'AS'
                    ],
                    [
                        'nama' => 'Zaenudin',
                        'jabatan' => 'Petugas Keamanan',
                        'foto' => 'dedi.jpg',
                        'inisial' => 'DK'
                    ],
                    [
                        'nama' => 'Asik Junaedi',
                        'jabatan' => 'Petugas Keamanan',
                        'foto' => 'agus.jpg',
                        'inisial' => 'AJ'
                    ],
                    [
                        'nama' => 'Teguh Purwadi',
                        'jabatan' => 'Petugas Keamanan',
                        'foto' => 'rizky.jpg',
                        'inisial' => 'TP'
                    ],
                ];
            @endphp

            <div class="staff-list">

                @foreach($petugas as $p)

                    <div class="staff-card">

                        <img
                            src="{{ asset('images/petugas/'.$p['foto']) }}"
                            alt="{{ $p['nama'] }}"
                            loading="lazy"
                            onerror="
                                this.style.display='none';
                                this.nextElementSibling.style.display='flex';
                            "
                        >

                        <div class="staff-placeholder">
                            {{ $p['inisial'] }}
                        </div>

                        <div class="staff-card-content">
                            <h3>{{ $p['nama'] }}</h3>

                            <span class="staff-role">
                                {{ $p['jabatan'] }}
                            </span>
                        </div>

                    </div>

                @endforeach

            </div>

            {{-- INFORMASI PATROLI --}}
            <div class="patrol-information">

                <h3>Jadwal Patroli Keamanan Lingkungan</h3>

                <p>
                    Petugas keamanan RW 04 melaksanakan patroli
                    keliling wilayah setiap hari pada pukul
                    <strong>02.00 WIB dini hari</strong>.
                    Kegiatan ini bertujuan untuk memantau kondisi
                    lingkungan pada waktu istirahat warga,
                    memastikan situasi tetap aman dan kondusif,
                    serta mengantisipasi potensi gangguan keamanan.

                    <br><br>

                    Dalam pelaksanaannya, petugas melakukan
                    pemantauan di jalan lingkungan, gang permukiman,
                    akses keluar masuk wilayah, serta area fasilitas
                    umum. Apabila ditemukan kondisi yang mencurigakan
                    atau kejadian darurat, petugas akan melakukan
                    koordinasi dengan pengurus RW dan pihak terkait.

                    <br><br>

                    Selain patroli petugas keamanan, masyarakat
                    juga berpartisipasi melalui kegiatan ronda malam
                    secara bergiliran yang melibatkan 11 RT di
                    lingkungan RW 04.
                </p>

            </div>

        </section>

        {{-- JADWAL RONDA --}}
        <section class="schedule-section">

            <h2 class="security-heading">
                Jadwal Ronda Malam
            </h2>

            <p class="security-description"
               style="margin-bottom:25px;">

                Jadwal ronda malam dilaksanakan secara bergiliran
                oleh 11 RT di lingkungan RW 04, khususnya pada
                Jumat malam dan Sabtu malam.

            </p>

            <div class="schedule-wrapper">

                <table class="schedule-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>RT</th>
                            <th>Petugas</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($jadwals ?? [] as $index => $jadwal)

                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}
                                </td>

                                <td>
                                    <span class="rt-label">
                                        {{ $jadwal->rt }}
                                    </span>
                                </td>

                                <td>{{ $jadwal->petugas }}</td>

                                <td>{{ $jadwal->hari }}</td>

                                <td>
                                    {{ $jadwal->jam_mulai }}
                                    -
                                    {{ $jadwal->jam_selesai }}
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="empty-schedule">
                                    Belum ada jadwal ronda yang tersedia.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

        {{-- DOKUMENTASI --}}
        <section class="documentation-section">

            <h2 class="security-heading">
                Dokumentasi Kegiatan
            </h2>

            <p class="security-description"
               style="margin-bottom:25px;">

                Dokumentasi kegiatan keamanan, patroli petugas,
                dan ronda malam lingkungan RW 04 Jatinegara Kaum.

            </p>

            <div class="documentation-grid">

                @forelse($dokumentasis ?? [] as $dokumentasi)

                    @if($dokumentasi->foto)

                        <img
                            src="{{ asset('storage/'.$dokumentasi->foto) }}"
                            alt="Dokumentasi keamanan RW 04"
                            loading="lazy"
                        >

                    @endif

                @empty

                    <p class="documentation-empty">
                        Belum ada foto dokumentasi kegiatan.
                    </p>

                @endforelse

            </div>

        </section>

    </div>

</div>

@include('templates.footer')
