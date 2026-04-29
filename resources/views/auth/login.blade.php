<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="mb-6 text-3xl font-extrabold text-slate-900">Masuk ke SoeFace</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email atau nomor ponsel')" />
            <x-text-input id="email" class="block mt-1 w-full !rounded-2xl !py-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <div class="relative mt-1">
                <x-text-input id="password" class="block w-full !rounded-2xl !py-3 pe-11"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <button type="button" data-toggle-password="password" class="absolute inset-y-0 right-3 my-auto text-sm font-semibold text-slate-500 hover:text-slate-700">
                    Lihat
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full rounded-2xl bg-sky-600 px-4 py-3 text-lg font-bold text-white transition hover:bg-sky-500">
                {{ __('Login') }}
            </button>
        </div>

        <div class="mt-5 text-center">
            @if (Route::has('password.request'))
                <a class="text-base font-medium text-slate-700 hover:text-sky-700" href="{{ route('password.request') }}">
                    {{ __('Lupa kata sandi?') }}
                </a>
            @endif
        </div>

        <div class="mt-6 border-t border-slate-200 pt-6">
            <a href="{{ route('register') }}" class="block w-full rounded-2xl border border-sky-600 px-4 py-3 text-center text-lg font-bold text-sky-700 transition hover:bg-sky-50">
                Buat akun baru
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
