@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-secondary dark:border-secondary text-sm font-medium leading-5 text-secondary-content dark:text-secondary-content focus:outline-none focus:border-secondary transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-secondary-content dark:text-secondary-content hover:text-secondary-content dark:hover:text-secondary-content hover:border-secondary dark:hover:border-secondary focus:outline-none focus:text-secondary-content dark:focus:text-secondary-content focus:border-secondary dark:focus:border-secondary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
