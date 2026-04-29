<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold leading-tight text-slate-800">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto flex max-w-7xl flex-col gap-6 px-4 sm:px-6 lg:px-8">
            <div class="glass-card p-5 sm:p-8">
                <h3 class="text-lg font-bold text-slate-900">Upload Gambar</h3>
                <p class="mt-1 text-sm text-slate-600">Upload postingan baru langsung dari halaman profile.</p>
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="mt-4 space-y-3">
                    @csrf
                    <textarea name="caption" rows="3" class="w-full rounded-xl border-slate-200 bg-white px-4 py-3 text-sm focus:border-sky-500 focus:ring-sky-500" placeholder="Tulis caption..."></textarea>
                    <label class="flex cursor-pointer items-center justify-between rounded-xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700">
                        <span>Pilih gambar</span>
                        <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" class="hidden" required>
                    </label>
                    <button class="rounded-xl bg-sky-600 px-4 py-2.5 text-sm font-bold text-white hover:bg-sky-500">Upload</button>
                </form>
            </div>

            <div class="glass-card p-5 sm:p-8">
                <h3 class="text-lg font-bold text-slate-900">Gambar Upload Saya</h3>
                <p class="mt-1 text-sm text-slate-600">Daftar semua gambar yang sudah kamu upload.</p>
                <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse($myPosts as $post)
                        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
                            <img src="{{ asset('storage/'.$post->image_path) }}" class="h-48 w-full object-cover" alt="Post image">
                            <div class="space-y-2 p-3">
                                <p class="text-sm text-slate-700">{{ $post->caption ?: 'Tanpa caption' }}</p>
                                <p class="text-xs text-slate-500">{{ $post->created_at->format('d M Y H:i') }}</p>
                                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded-lg bg-rose-600 px-3 py-1.5 text-xs font-bold text-white">Hapus</button>
                                </form>
                            </div>
                        </article>
                    @empty
                        <p class="text-sm text-slate-500">Belum ada gambar yang kamu upload.</p>
                    @endforelse
                </div>
            </div>

            <div class="glass-card p-5 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="glass-card p-5 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="glass-card p-5 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
