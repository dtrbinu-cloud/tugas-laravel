<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoeFace</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#F0F2F5] text-slate-900" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <div class="mx-auto flex min-h-screen max-w-7xl flex-col px-4 py-6 sm:px-6 lg:px-8">
        <header class="flex items-center justify-between">
            <h1 class="text-3xl font-extrabold text-[#1877F2]">SoeFace</h1>
            <div class="flex items-center gap-2">
                <a href="{{ route('login') }}" class="rounded-lg px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-white">Login</a>
                <a href="{{ route('register') }}" class="rounded-lg bg-[#1877F2] px-4 py-2 text-sm font-bold text-white hover:brightness-95">Register</a>
            </div>
        </header>

        <main class="grid flex-1 items-center gap-8 py-10 md:grid-cols-2">
            <section>
                <h2 class="text-4xl font-extrabold leading-tight text-[#1877F2] sm:text-5xl">Connect. Share. Grow.</h2>
                <p class="mt-4 max-w-xl text-base text-slate-600 sm:text-lg">
                    SoeFace adalah social media modern untuk berbagi momen, terhubung dengan teman, dan membangun komunitas.
                </p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('register') }}" class="rounded-xl bg-[#1877F2] px-6 py-3 text-sm font-bold text-white">Mulai Sekarang</a>
                    <a href="{{ route('login') }}" class="rounded-xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700">Sudah Punya Akun</a>
                </div>
            </section>

            <section class="rounded-2xl bg-white p-5 shadow-sm sm:p-6">
                <div class="space-y-4">
                    <div class="rounded-xl bg-[#F0F2F5] p-4">
                        <p class="text-sm font-bold">Create Post</p>
                        <p class="text-xs text-slate-500">Upload foto dan bagikan cerita kamu.</p>
                    </div>
                    <div class="rounded-xl bg-[#F0F2F5] p-4">
                        <p class="text-sm font-bold">Like & Comment</p>
                        <p class="text-xs text-slate-500">Interaksi cepat dengan sistem like toggle.</p>
                    </div>
                    <div class="rounded-xl bg-[#F0F2F5] p-4">
                        <p class="text-sm font-bold">Active Contacts</p>
                        <p class="text-xs text-slate-500">Lihat siapa yang sedang aktif.</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
