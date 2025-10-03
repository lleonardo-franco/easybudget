@props(['value' => null])

<label {{ $attributes->merge(['class' => 'flex items-center gap-2 text-sm font-semibold text-neutral-700']) }}>
    {{ $value ?? $slot }}
</label>
