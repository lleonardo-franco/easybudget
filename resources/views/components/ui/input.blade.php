@props([
    'type' => 'text',
    'invalid' => false,
])

@php
    $base = 'block w-full rounded-2xl border border-surface-300/70 bg-white/90 px-4 py-3 text-base text-neutral-900 shadow-sm transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-300 focus:ring-4 focus:ring-primary-100 focus:outline-none';
    $invalidClasses = $invalid ? ' border-danger-400 focus:border-danger-400 focus:ring-danger-100' : '';
@endphp

<input {{ $attributes->merge(['type' => $type, 'class' => $base . $invalidClasses]) }} />
