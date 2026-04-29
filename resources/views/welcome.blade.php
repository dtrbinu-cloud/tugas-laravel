<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoeFace</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="relative isolate overflow-hidden">
        <div class="pointer-events-none absolute -top-24 left-1/2 -z-10 h-72 w-72 -translate-x-1/2 rounded-full bg-sky-400/30 blur-3xl"></div>
        <div class="mx-auto min-h-screen max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <header class="glass-card flex items-center justify-between px-6 py-4">
                <h1 class="text-2xl font-extrabold tracking-tight text-sky-700 sm:text-3xl">SoeFace</h1>
                <div class="flex gap-2">
                    <a href="{{ route('login') }}" class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-700">Login</a>
                    <a href="{{ route('register') }}" class="rounded-xl bg-sky-600 px-4 py-2 text-sm font-bold text-white transition hover:bg-sky-500">Register</a>
                </div>
            </header>

            <main class="grid items-center gap-8 py-10 lg:grid-cols-2 lg:py-16">
                <section>
                    <p class="mb-3 inline-flex rounded-full bg-sky-100 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] text-sky-700">Social Platform</p>
                    <h2 class="text-4xl font-extrabold leading-tight text-slate-900 sm:text-6xl">Terhubung dan berbagi dalam satu feed modern.</h2>
                    <p class="mt-5 max-w-xl text-base text-slate-600 sm:text-lg">SoeFace bantu kamu publish momen, berinteraksi cepat, dan bangun komunitas aktif dengan antarmuka yang bersih dan fokus konten.</p>
                    <div class="mt-7 flex flex-wrap gap-3">
                        <a href="{{ route('register') }}" class="rounded-2xl bg-slate-900 px-6 py-3 text-sm font-bold text-white transition hover:bg-slate-700">Mulai Gratis</a>
                        <a href="{{ route('login') }}" class="rounded-2xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-400">Sudah Punya Akun</a>
                    </div>
                </section>

                <section class="grid gap-4 sm:grid-cols-2">
                    <article class="glass-card p-5 sm:col-span-2">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-500">Feature</p>
                        <h3 class="mt-2 text-lg font-bold text-slate-900">Create Post</h3>
                        <p class="mt-1 text-sm text-slate-600">Upload foto dan tulis caption singkat dalam satu langkah.</p>
                    </article>
                    <article class="glass-card p-5">
                        <h3 class="text-base font-bold text-slate-900">Like & Comment</h3>
                        <p class="mt-1 text-sm text-slate-600">Interaksi real-time untuk tiap postingan.</p>
                    </article>
                    <article class="glass-card p-5">
                        <h3 class="text-base font-bold text-slate-900">Active Contacts</h3>
                        <p class="mt-1 text-sm text-slate-600">Pantau teman yang sedang aktif sekarang.</p>
                    </article>
                </section>
            </main>
        </div>
    </div>
</body>
</html>
