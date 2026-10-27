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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="w-full max-w-md px-4 sm:px-0">
                <div class="mb-4 flex items-center justify-between text-sm text-gray-600 dark:text-gray-300">
                    <a href="{{ url('/') }}" class="hover:text-gray-900 dark:hover:text-white">Beranda</a>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('login') }}" class="hover:text-gray-900 dark:hover:text-white">Login</a>
                        <a href="{{ route('register') }}" class="hover:text-gray-900 dark:hover:text-white">Daftar</a>
                    </div>
                </div>
                <div class="flex justify-center">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
