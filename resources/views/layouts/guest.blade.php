<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-100">
        <div class="grid min-h-screen grid-cols-1 lg:grid-cols-2">
            <section class="relative hidden overflow-hidden border-r border-slate-200 bg-white px-10 py-12 lg:block">
                <a href="/" class="inline-flex items-center gap-3">
                    <x-application-logo class="h-10 w-10 fill-current text-sky-600" />
                    <span class="text-xl font-extrabold text-slate-900">SoeFace</span>
                </a>
                <div class="mt-16 max-w-md">
                    <h1 class="text-6xl font-extrabold leading-[0.95] text-slate-900">
                        Jelajahi hal-hal
                        <span class="text-sky-600">yang Anda sukai.</span>
                    </h1>
                </div>

                <div class="pointer-events-none absolute right-10 top-24 h-72 w-56 rounded-3xl bg-sky-100"></div>
                <div class="pointer-events-none absolute right-28 top-40 h-72 w-64 rounded-3xl bg-gradient-to-br from-sky-400 to-blue-600 shadow-2xl"></div>
                <div class="pointer-events-none absolute right-16 top-[420px] h-28 w-28 rounded-full border-4 border-white bg-slate-200 shadow-xl"></div>
            </section>

            <section class="flex items-center justify-center px-5 py-10 sm:px-10">
                <div class="w-full max-w-xl">
                    <div class="mb-8 lg:hidden">
                        <a href="/" class="inline-flex items-center gap-2 text-slate-900">
                            <x-application-logo class="h-10 w-10 fill-current text-sky-600" />
                            <span class="text-2xl font-extrabold">SoeFace</span>
                        </a>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm sm:p-10">
                        {{ $slot }}
                    </div>
                </div>
            </section>
        </div>        
    </body>
</html>
