@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full rounded-lg bg-sky-50 px-4 py-2 text-start text-base font-semibold text-sky-700 transition'
            : 'block w-full rounded-lg px-4 py-2 text-start text-base font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
