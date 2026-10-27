<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                <div class="mx-auto flex min-h-16 max-w-7xl items-center justify-between gap-6 px-4 sm:px-6 lg:px-8">
                    <a href="{{ route('laporan.form') }}" class="font-semibold text-gray-900 dark:text-gray-100">LaporBanjir BPBD</a>
                    <div class="flex flex-wrap items-center justify-end gap-x-6 gap-y-2 text-sm">
                        @auth
                            <a href="{{ route('laporan.daftar') }}" class="text-gray-700 hover:text-gray-950 dark:text-gray-200 dark:hover:text-white">Daftar Laporan</a>
                            <a href="{{ route('profile.show') }}" class="text-gray-700 hover:text-gray-950 dark:text-gray-200 dark:hover:text-white">Profil Petugas</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-gray-950 dark:text-gray-200 dark:hover:text-white">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-950 dark:text-gray-200 dark:hover:text-white">Login</a>
                            <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-950 dark:text-gray-200 dark:hover:text-white">Register</a>
                        @endauth
                    </div>
                </div>
            </nav>

            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot ?? '' }}
                @yield('content')
            </main>
        </div>
    </body>
</html>
