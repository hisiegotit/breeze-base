@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-success dark:text-success']) }}>
        {{ $status }}
    </div>
@endif
