
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Portal RW 04')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        :root {
            --primary: #ae1935;
            --dark: #202938;
            --muted: #748096;
            --surface: #f7f8fa;
            --border: #e8eaf0;
            --container-width: 1240px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--dark);
            background: #fff;
            line-height: 1.6;
        }

        /* KERANGKA RESPONSIF */
        .page-wrapper {
            width: 100%;
            min-height: 100vh;
            overflow-wrap: anywhere;
        }

        .page-container {
            width: min(
                calc(100% - 48px),
                var(--container-width)
            );
            margin-inline: auto;
        }

        .page-content {
            min-height: 60vh;
        }

        img, video, iframe {
            max-width: 100%;
        }

        img {
            height: auto;
        }

        /* KOMPONEN UMUM */
        .section {
            padding-block: 80px;
        }

        .section-soft {
            background: var(--surface);
        }

        .section-heading {
            margin-bottom: 12px;
            font-size: clamp(26px, 3vw, 42px);
            font-weight: 800;
            line-height: 1.2;
        }

        .section-description {
            color: var(--muted);
            font-size: 15px;
        }

        .responsive-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .responsive-card {
            min-width: 0;
            padding: 24px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: #fff;
        }

        /* TABLET */
        @media (max-width: 991.98px) {
            :root {
                --container-width: 100%;
            }

            .page-container {
                width: calc(100% - 36px);
            }

            .section {
                padding-block: 60px;
            }

            .responsive-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 18px;
            }
        }

        /* MOBILE */
        @media (max-width: 575.98px) {
            .page-container {
                width: calc(100% - 32px);
            }

            .section {
                padding-block: 40px;
            }

            .section-heading {
                font-size: 27px;
            }

            .section-description {
                font-size: 13px;
            }

            .responsive-grid {
                grid-template-columns: minmax(0, 1fr);
                gap: 14px;
            }

            .responsive-card {
                padding: 18px;
                border-radius: 12px;
            }

            .mobile-full {
                width: 100%;
            }
        }

        @stack('styles')
    </style>
</head>

<body>
<div class="page-wrapper">

    {{-- NAVBAR TEMPLATE --}}
    @include('templates.navbar')

    {{-- KONTEN HALAMAN --}}
    <main class="page-content">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @includeIf('templates.footer')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>
