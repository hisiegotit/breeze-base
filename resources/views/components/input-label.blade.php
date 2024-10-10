@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-secondary-content dark:text-secondary-content']) }}>
    {{ $value ?? $slot }}
</label>
