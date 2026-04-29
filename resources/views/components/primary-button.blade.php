<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-xl bg-sky-600 px-4 py-2.5 text-xs font-bold uppercase tracking-wider text-white transition hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
