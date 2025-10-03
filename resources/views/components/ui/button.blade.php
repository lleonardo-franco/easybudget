@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
])

@php
    $base = 'inline-flex items-center justify-center gap-2 font-semibold tracking-tight transition-all duration-200 rounded-2xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-white disabled:cursor-not-allowed disabled:opacity-60';

    $variants = [
        'primary' => 'bg-primary-600 text-white shadow-[0_18px_44px_-22px_rgba(56,73,220,0.65)] hover:-translate-y-0.5 hover:bg-primary-500 focus-visible:ring-primary-300',
        'secondary' => 'bg-neutral-900 text-white shadow-[0_18px_40px_-25px_rgba(15,23,42,0.65)] hover:-translate-y-0.5 hover:bg-neutral-800 focus-visible:ring-neutral-600',
        'ghost' => 'bg-white/70 text-neutral-900 shadow-none ring-1 ring-neutral-200 hover:bg-white focus-visible:ring-primary-200',
        'link' => 'bg-transparent text-primary-600 shadow-none hover:text-primary-500 focus-visible:ring-primary-200 focus-visible:ring-offset-0',
    ];

    $sizes = [
        'sm' => 'px-4 py-2 text-sm',
        'md' => 'px-5 py-3 text-base',
        'lg' => 'px-6 py-3.5 text-lg',
    ];

    $class = trim(implode(' ', [
        $base,
        $variants[$variant] ?? $variants['primary'],
        $sizes[$size] ?? $sizes['md'],
    ]));
@endphp

<button {{ $attributes->merge(['type' => $type, 'class' => $class]) }}>
    {{ $slot }}
</button>
