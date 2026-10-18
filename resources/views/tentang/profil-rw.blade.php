
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Profil RW 04 Jatinegara Kaum, visi, misi, dan lokasi sekretariat.">

    <title>Profil RW 04 | Jatinegara Kaum</title>

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #202536;
            background: #f7f8fc;
            line-height: 1.8;
        }

        .container {
            width: min(1400px, 92%);
            margin: 0 auto;
        }

        /* BREADCRUMB */
        .breadcrumb {
            padding: 25px 0;
            color: #7a8190;
            font-size: 14px;
        }

        .breadcrumb a {
            color: #b71937;
            text-decoration: none;
        }

        /* PROFIL RW 04 */
        .profile-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            align-items: center;
            gap: 50px;
            margin: 10px 0 75px;
        }

        .profile-text {
            min-width: 0;
        }

        .profile-text h1 {
            margin: 0 0 25px;
            color: #202536;
            font-size: clamp(30px, 3vw, 38px);
            font-weight: 700;
            line-height: 1.3;
            text-align: left;
        }

        .profile-text p {
            margin: 0 0 20px;
            color: #596174;
            font-size: 16px;
            line-height: 1.9;
            text-align: justify;
            text-justify: inter-word;
            overflow-wrap: break-word;
        }

        .profile-text p:last-child {
            margin-bottom: 0;
        }

        .profile-image {
            min-width: 0;
        }

        .profile-image img {
            display: block;
            width: 100%;
            height: 420px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 12px 30px rgba(32, 37, 54, 0.10);
        }

        .image-caption {
            margin-top: 10px;
            color: #858b99;
            font-size: 12px;
            text-align: center;
        }

        /* VISI DAN MISI */
        .vision-mission-grid {
            display: grid;
            grid-template-columns: minmax(0, 0.85fr) minmax(0, 1.15fr);
            align-items: stretch;
            gap: 25px;
            margin-bottom: 75px;
        }

        .content-card {
            min-width: 0;
            padding: 30px;
            border: 1px solid #edf0f5;
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 7px 25px rgba(32, 37, 54, 0.04);
        }

        .card-heading {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 20px;
        }

        .heading-icon {
            display: flex;
            flex: 0 0 46px;
            width: 46px;
            height: 46px;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #fff0f3;
            color: #a91634;
            font-size: 23px;
        }

        .card-heading h2 {
            margin: 0;
            color: #a91634;
            font-size: 23px;
        }

        .vision-box {
            padding: 22px;
            border-left: 5px solid #b71937;
            border-radius: 8px;
            background: #fff5f6;
            color: #42495a;
            font-size: 16px;
            line-height: 1.9;
            text-align: justify;
        }

        .mission-list {
            display: grid;
            gap: 10px;
            padding: 0;
            margin: 0;
            list-style: none;
            counter-reset: mission;
        }

        .mission-list li {
            position: relative;
            padding: 12px 12px 12px 48px;
            border: 1px solid #edf0f5;
            border-radius: 9px;
            color: #596174;
            counter-increment: mission;
        }

        .mission-list li::before {
            content: counter(mission, decimal-leading-zero);
            position: absolute;
            top: 12px;
            left: 13px;
            color: #b71937;
            font-weight: bold;
        }

        /* LOKASI SEKRETARIAT */
        .location-section {
            margin-bottom: 50px;
        }

        .section-title {
            margin: 0 0 12px;
            color: #202536;
            font-size: clamp(27px, 3vw, 34px);
            line-height: 1.4;
        }

        .section-description {
            margin: 0 0 25px;
            color: #596174;
        }

        .location-grid {
            display: grid;
            grid-template-columns: minmax(0, 0.85fr) minmax(0, 1.15fr);
            align-items: stretch;
            gap: 30px;
        }

        .location-details {
            padding: 28px;
            border: 1px solid #edf0f5;
            border-radius: 15px;
            background: #fff;
        }

        .location-item {
            padding: 16px 0;
            border-bottom: 1px solid #edf0f5;
        }

        .location-item:first-child {
            padding-top: 0;
        }

        .location-item:last-of-type {
            border-bottom: none;
        }

        .location-item strong {
            display: block;
            margin-bottom: 5px;
            color: #a91634;
        }

        .location-item span {
            color: #596174;
            font-size: 14px;
        }

        .map-wrapper {
            overflow: hidden;
            border: 1px solid #edf0f5;
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 7px 25px rgba(32, 37, 54, 0.04);
        }

        .map-frame {
            display: block;
            width: 100%;
            height: 390px;
            border: 0;
        }

        .map-caption {
            padding: 15px 18px;
            color: #737b8c;
            font-size: 13px;
        }

        /* TOMBOL */
        .primary-button,
        .secondary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 19px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .primary-button {
            margin-top: 15px;
            background: #a91634;
            color: #fff;
        }

        .primary-button:hover {
            background: #861128;
        }

        .secondary-button {
            border: 1px solid #e1e5ec;
            background: #fff;
            color: #343b4c;
        }

        .secondary-button:hover {
            border-color: #a91634;
            color: #a91634;
        }

        .page-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin: 35px 0 50px;
        }

        /* TABLET */
        @media (max-width: 900px) {
            .profile-grid {
                gap: 30px;
            }

            .profile-image img {
                height: 350px;
            }

            .content-card,
            .location-details {
                padding: 22px;
            }
        }

        /* MOBILE */
        @media (max-width: 680px) {
            .profile-grid,
            .vision-mission-grid,
            .location-grid {
                grid-template-columns: minmax(0, 1fr);
                gap: 22px;
            }

            .profile-grid {
                margin: 10px 0 50px;
            }

            .profile-text h1 {
                font-size: 29px;
            }

            .profile-text p {
                font-size: 15px;
                line-height: 1.8;
                text-align: left;
            }

            .profile-image img {
                height: 270px;
            }

            .vision-mission-grid {
                margin-bottom: 50px;
            }

            .card-heading h2 {
                font-size: 21px;
            }

            .map-frame {
                height: 310px;
            }

            .page-actions {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR WEBSITE --}}
    @include('templates.navbar')

    <main class="container">

        {{-- PROFIL RW 04 --}}
        <section class="profile-grid">

            <div class="profile-text">
                <h1>Profil RW 04</h1>

                <p>
                    RW 04 Jatinegara Kaum merupakan bagian dari wilayah
                    Kelurahan Jatinegara Kaum, Kecamatan Pulogadung,
                    Kota Administrasi Jakarta Timur, DKI Jakarta.
                </p>

                <p>
                    Rukun Warga berperan dalam mendukung koordinasi
                    kemasyarakatan, membantu pelayanan warga, serta
                    mendorong terciptanya lingkungan yang aman, tertib,
                    bersih, dan harmonis.
                </p>

                <p>
                    Melalui Portal Informasi RW 04, warga diharapkan
                    dapat mengakses informasi kegiatan, pengumuman,
                    layanan administrasi, dan perkembangan lingkungan
                    dengan lebih mudah.
                </p>

                <p>
                    Partisipasi aktif warga menjadi bagian penting
                    dalam membangun lingkungan yang peduli, guyub,
                    dan saling membantu.
                </p>
            </div>

            <div class="profile-image">
                <img
                    src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?auto=format&fit=crop&w=1400&q=85"
                    alt="Ilustrasi kawasan perkotaan"
                    loading="lazy">

                <div class="image-caption">
                    Ilustrasi lingkungan perkotaan
                </div>
            </div>

        </section>

        {{-- VISI DAN MISI --}}
        <section class="vision-mission-grid">

            <article class="content-card">
                <div class="card-heading">
                    <div class="heading-icon">◎</div>
                    <h2>Visi</h2>
                </div>

                <div class="vision-box">
                    Mewujudkan lingkungan RW 04 yang tertib, aman,
                    bersih, nyaman, harmonis, dan berorientasi pada
                    pelayanan warga yang transparan serta partisipatif.
                </div>
            </article>

            <article class="content-card">
                <div class="card-heading">
                    <div class="heading-icon">☑</div>
                    <h2>Misi</h2>
                </div>

                <ol class="mission-list">
                    <li>
                        Meningkatkan kualitas pelayanan administrasi
                        dan akses informasi bagi warga.
                    </li>
                    <li>
                        Menjaga keamanan, ketertiban, kebersihan,
                        dan kenyamanan lingkungan.
                    </li>
                    <li>
                        Mendorong partisipasi warga dalam gotong royong
                        dan kegiatan kemasyarakatan.
                    </li>
                    <li>
                        Membangun komunikasi yang baik antara pengurus
                        RW, RT, dan warga.
                    </li>
                    <li>
                        Mendukung kegiatan kesehatan dan kepedulian sosial.
                    </li>
                    <li>
                        Mendorong pengelolaan administrasi dan kas RW
                        yang tertib serta bertanggung jawab.
                    </li>
                    <li>
                        Memanfaatkan teknologi informasi untuk
                        meningkatkan pelayanan warga.
                    </li>
                </ol>
            </article>

        </section>

        {{-- LOKASI SEKRETARIAT --}}
        <section class="location-section" id="lokasi">

            <h2 class="section-title">Lokasi Sekretariat RW 04</h2>

            <p class="section-description">
                Informasi wilayah dan peta untuk membantu warga
                mencari lokasi sekretariat RW 04.
            </p>

            <div class="location-grid">

                <div class="location-details">
                    <div class="location-item">
                        <strong>Wilayah</strong>
                        <span>RW 04 Jatinegara Kaum</span>
                    </div>

                    <div class="location-item">
                        <strong>Kelurahan</strong>
                        <span>Jatinegara Kaum</span>
                    </div>

                    <div class="location-item">
                        <strong>Kecamatan</strong>
                        <span>Pulogadung</span>
                    </div>

                    <div class="location-item">
                        <strong>Kota Administrasi</strong>
                        <span>Jakarta Timur, DKI Jakarta</span>
                    </div>

                    <a
                        class="primary-button"
                        href="https://www.google.com/maps/search/?api=1&query=Sekretariat%20RW%2004%20Jatinegara%20Kaum%20Pulogadung%20Jakarta%20Timur"
                        target="_blank"
                        rel="noopener noreferrer">
                        Buka Google Maps ↗
                    </a>
                </div>

                <div class="map-wrapper">
                    <iframe
                        class="map-frame"
                        title="Peta pencarian Sekretariat RW 04 Jatinegara Kaum"
                        src="https://maps.google.com/maps?q=Sekretariat%20RW%2004%20Jatinegara%20Kaum%20Pulogadung%20Jakarta%20Timur&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen>
                    </iframe>

                    <div class="map-caption">
                        Peta pencarian wilayah Sekretariat RW 04.
                        Pastikan titik lokasi sesuai dengan alamat sekretariat sebenarnya.
                    </div>
                </div>

            </div>
        </section>

        {{-- TOMBOL NAVIGASI --}}
        <div class="page-actions">
            <a
                class="secondary-button"
                href="{{ route('beranda') }}">
                ← Kembali ke Beranda
            </a>

            <a
                class="secondary-button"
                href="#lokasi">
                Lihat Lokasi Sekretariat
            </a>
        </div>

    </main>

    {{-- FOOTER WEBSITE --}}
    @include('templates.footer')

</body>
</html>
