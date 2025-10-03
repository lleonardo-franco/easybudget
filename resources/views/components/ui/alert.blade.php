@props([
    'variant' => 'info',
    'title' => null,
])

@php
    $variants = [
        'info' => 'bg-primary-50 text-primary-700 ring-1 ring-primary-100',
        'success' => 'bg-success-50 text-success-700 ring-1 ring-success-100',
        'warning' => 'bg-secondary-50 text-secondary-700 ring-1 ring-secondary-100',
        'danger' => 'bg-danger-50 text-danger-600 ring-1 ring-danger-100',
    ];

    $classes = 'w-full rounded-2xl px-4 py-3 text-sm font-medium shadow-sm';
@endphp

<div {{ $attributes->merge(['class' => $classes . ' ' . ($variants[$variant] ?? $variants['info'])]) }}>
    @if ($title)
        <p class="font-semibold">{{ $title }}</p>
    @endif
    <div>{{ $slot }}</div>
</div>
