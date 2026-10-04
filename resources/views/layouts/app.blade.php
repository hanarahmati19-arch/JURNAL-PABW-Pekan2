<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'LaporBanjir') - BPBD</title>
    <style>
        :root {
            --bg: #f8f6fc;
            --ungu-muda: #e9d8fd;
            --ungu-aksen: #a855f7;
            --ungu-gelap: #4c1d95;
            --teks: #1e1b4b;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: var(--bg);
            color: var(--teks);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Lembut & Bersih */
        header {
            background: linear-gradient(135deg, #e9d8fd 0%, #f3e8ff 100%);
            padding: 20px 32px;
            border-bottom: 1px solid #d8b4fe;
        }
        header h1 {
            font-size: 1.4rem;
            color: var(--ungu-gelap);
            letter-spacing: -0.5px;
        }
        header small {
            color: #6b21a8;
            font-size: 0.85rem;
        }

        /* Navigasi Minimalis */
        nav {
            background: #ffffff;
            padding: 0 32px;
            display: flex;
            gap: 12px;
            border-bottom: 1px solid #ede9fe;
        }
        nav a {
            color: #6b21a8;
            text-decoration: none;
            padding: 12px 14px;
            font-weight: 500;
            font-size: 0.9rem;
            border-bottom: 2px solid transparent;
            transition: all 0.2s;
        }
        nav a:hover, nav a.aktif {
            color: var(--ungu-gelap);
            border-bottom-color: var(--ungu-aksen);
        }

        /* Area Konten Utama */
        main {
            flex: 1;
            width: 100%;
            max-width: 800px;
            margin: 32px auto;
            padding: 0 16px;
        }

        /* Kartu Panel Nyata / Elegan */
        .panel {
            background: #ffffff;
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 10px 25px -5px rgba(147, 51, 234, 0.08), 0 8px 10px -6px rgba(147, 51, 234, 0.04);
            border: 1px solid #f3e8ff;
        }

        h2 {
            color: var(--ungu-gelap);
            font-size: 1.3rem;
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-weight: 600;
            font-size: 0.9rem;
            margin: 14px 0 6px;
            color: #4b5563;
        }

        input {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input:focus {
            border-color: var(--ungu-aksen);
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.15);
        }

        /* Tombol Modern */
        .btn {
            display: inline-block;
            margin-top: 20px;
            background: var(--ungu-aksen);
            color: #ffffff;
            font-weight: 600;
            border: 0;
            padding: 11px 22px;
            border-radius: 8px;
            font-size: 0.95rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
            transition: all 0.2s;
        }
        .btn:hover {
            background: var(--ungu-gelap);
            box-shadow: 0 4px 14px rgba(76, 29, 149, 0.3);
        }

        /* Footer Rapi */
        footer {
            background: #ffffff;
            color: #6b7280;
            text-align: center;
            padding: 18px;
            font-size: 0.85rem;
            border-top: 1px solid #f3e8ff;
        }
    </style>
</head>
<body>

    <header>
        <h1>LaporBanjir</h1>
        <small>Sistem Pelaporan Banjir - BPBD Kabupaten Bandung</small>
    </header>

    <nav>
        <a href="{{ route('lapor.form') }}" class="{{ request()->routeIs('lapor.form') ? 'aktif' : '' }}">Form Laporan</a>
        <a href="{{ route('logistik.index') }}" class="{{ request()->routeIs('logistik.*') ? 'aktif' : '' }}">Kalkulator Logistik</a>
    </nav>

    <main>
        <div class="panel">
            @yield('content')
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} BPBD Kabupaten Bandung
    </footer>

    @yield('scripts')
</body>
</html>

    <nav>
        <a href="{{ route('lapor.form') }}" class="{{ request()->routeIs('lapor.form') ? 'aktif' : '' }}">Form Laporan</a>
        <a href="{{ route('lapor.daftar') }}" class="{{ request()->routeIs('lapor.daftar') ? 'aktif' : '' }}">Daftar Laporan</a>
        <a href="{{ route('logistik.index') }}" class="{{ request()->routeIs('logistik.*') ? 'aktif' : '' }}">Kalkulator Logistik</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>&copy; {{ date('Y') }} BPBD Kabupaten Bandung - Prototipe LaporBanjir</footer>

    @yield('scripts')
</body>
</html>
