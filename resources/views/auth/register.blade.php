<x-guest-layout>
    <h2 class="mb-6 text-3xl font-extrabold text-slate-900">Buat Akun Baru</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full !rounded-2xl !py-3" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full !rounded-2xl !py-3" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" />

            <div class="relative mt-1">
                <x-text-input id="password" class="block w-full !rounded-2xl !py-3 pe-11"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <button type="button" data-toggle-password="password" class="absolute inset-y-0 right-3 my-auto text-sm font-semibold text-slate-500 hover:text-slate-700">
                    Lihat
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />

            <div class="relative mt-1">
                <x-text-input id="password_confirmation" class="block w-full !rounded-2xl !py-3 pe-11"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <button type="button" data-toggle-password="password_confirmation" class="absolute inset-y-0 right-3 my-auto text-sm font-semibold text-slate-500 hover:text-slate-700">
                    Lihat
                </button>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full rounded-2xl bg-sky-600 px-4 py-3 text-lg font-bold text-white transition hover:bg-sky-500">
                {{ __('Daftar') }}
            </button>
        </div>

        <div class="mt-5 text-center">
            <a class="text-base font-medium text-slate-700 hover:text-sky-700" href="{{ route('login') }}">
                {{ __('Sudah punya akun? Login') }}
            </a>
        </div>
    </form>

    <script>
        document.querySelectorAll('[data-toggle-password]').forEach((btn) => {
            btn.addEventListener('click', () => {
                const input = document.getElementById(btn.dataset.togglePassword);
                if (!input) return;
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                btn.textContent = isHidden ? 'Sembunyi' : 'Lihat';
            });
        });
    </script>
</x-guest-layout>
