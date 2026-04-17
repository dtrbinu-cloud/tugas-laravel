<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SoeFace</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F0F2F5] text-slate-900" style="font-family: 'Plus Jakarta Sans', sans-serif;">
<nav class="sticky top-0 z-20 border-b border-slate-200 bg-white">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4">
        <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold text-[#1877F2]">SoeFace</a>
        <input class="hidden w-full max-w-md rounded-full bg-[#F0F2F5] px-4 py-2 text-sm md:block" placeholder="Search SoeFace">
        <div class="flex items-center gap-2">
            <a href="{{ route('dashboard') }}" class="rounded-full bg-[#F0F2F5] px-3 py-2 text-sm font-semibold text-[#1877F2]">Home</a>
            <a href="{{ route('profile.edit') }}" class="rounded-full bg-[#F0F2F5] px-3 py-2 text-sm">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="rounded-full bg-[#F0F2F5] px-3 py-2 text-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<main class="mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 py-6 lg:grid-cols-12">
    <aside class="hidden rounded-2xl bg-white p-4 shadow-sm lg:col-span-3 lg:block">
        <div class="mb-4 rounded-xl bg-[#F0F2F5] p-3">
            <p class="text-sm font-semibold">{{ auth()->user()->name }}</p>
            <p class="text-xs text-slate-500">{{ auth()->user()->email }}</p>
        </div>
        <ul class="space-y-2 text-sm">
            <li class="rounded-lg px-3 py-2 hover:bg-[#F0F2F5]">Friends</li>
            <li class="rounded-lg px-3 py-2 hover:bg-[#F0F2F5]">Groups</li>
        </ul>
    </aside>

    <section class="space-y-4 lg:col-span-6">
        @if (session('success'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('success') }}</div>
        @endif

        <div class="rounded-2xl bg-white p-4 shadow-sm">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-3">
                @csrf
                <textarea name="caption" rows="2" class="w-full rounded-xl border-slate-200 text-sm focus:border-[#1877F2] focus:ring-[#1877F2]" placeholder="What's on your mind?"></textarea>
                <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-dashed border-slate-300 bg-[#F0F2F5] px-4 py-3 text-sm font-semibold">
                    <span class="text-[#1877F2]">Upload Image</span>
                    <input type="file" name="image" accept=".jpg,.jpeg,.png" class="hidden" required>
                </label>
                <button class="w-full rounded-xl bg-[#1877F2] px-4 py-2.5 text-sm font-bold text-white">Post</button>
            </form>
        </div>

        @forelse($posts as $post)
            @php $liked = $post->likes->contains('user_id', auth()->id()); @endphp
            <article class="rounded-2xl bg-white shadow-sm">
                <div class="p-4">
                    <p class="text-sm font-bold">{{ $post->user->name }}</p>
                    <p class="text-xs text-slate-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
                @if($post->caption)
                    <p class="px-4 pb-3 text-sm">{{ $post->caption }}</p>
                @endif
                <img src="{{ asset('storage/'.$post->image_path) }}" class="w-full object-cover" alt="Post">
                <div class="space-y-3 p-4">
                    <form method="POST" action="{{ route('posts.like', $post) }}">
                        @csrf
                        <button class="rounded-lg px-3 py-2 text-sm font-semibold {{ $liked ? 'bg-[#1877F2] text-white' : 'bg-[#F0F2F5]' }}">
                            Like ({{ $post->likes->count() }})
                        </button>
                    </form>
                    <div class="rounded-lg bg-[#F0F2F5] p-3 text-sm text-slate-500">Comment section</div>
                </div>
            </article>
        @empty
            <div class="rounded-2xl bg-white p-8 text-center text-sm text-slate-500 shadow-sm">Belum ada postingan.</div>
        @endforelse
    </section>

    <aside class="hidden rounded-2xl bg-white p-4 shadow-sm xl:col-span-3 xl:block">
        <h3 class="text-sm font-bold text-slate-600">Active Contacts</h3>
        <ul class="mt-3 space-y-2 text-sm">
            <li class="rounded-lg px-3 py-2 hover:bg-[#F0F2F5]">Alya</li>
            <li class="rounded-lg px-3 py-2 hover:bg-[#F0F2F5]">Raka</li>
            <li class="rounded-lg px-3 py-2 hover:bg-[#F0F2F5]">Nadya</li>
        </ul>
    </aside>
</main>
</body>
</html>
