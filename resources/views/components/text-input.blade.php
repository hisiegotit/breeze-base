@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-secondary dark:border-secondary dark:bg-secondary dark:text-secondary-content focus:border-secondary dark:focus:border-secondary focus:ring-secondary dark:focus:ring-secondary rounded-md shadow-sm']) }}>
