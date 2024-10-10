<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-secondary dark:bg-secondary border border-transparent rounded-md font-semibold text-xs text-secondary-content dark:text-secondary-content uppercase tracking-widest hover:opacity-80 dark:hover:opacity-80 focus:bg-secondary dark:focus:bg-secondary active:opacity-80 dark:active:opacity-80 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2 dark:focus:ring-offset-secondary transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
