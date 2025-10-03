@props(['value' => null])

@if ($value ?? $slot)
    <p {{ $attributes->merge(['class' => 'mt-2 text-sm font-medium text-danger-500']) }}>
        {{ $value ?? $slot }}
    </p>
@endif
