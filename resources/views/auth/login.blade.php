<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address or Username-->
        <div>
            <x-input-label for="input_type" :value="__('Email/Username')" />
            <x-text-input id="input_type" class="block mt-1 w-full" type="text" name="input_type" :value="old('input_type')" autofocus autocomplete="input_type" />
            @if ($errors->has('username'))
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            @elseif ($errors->has('email'))
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-secondary border-secondary dark:border-secondary text-secondary shadow-sm focus:ring-secondary dark:focus:ring-isecondary dark:focus:ring-offset-secondary" name="remember">
                <span class="ms-2 text-sm text-secondary-content dark:text-secondary-content">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-secondary-content dark:text-secondary-content hover:text-primary-content dark:hover:text-primary-content rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary dark:focus:ring-offset-secondary" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <div class="divider">OR</div>
    <div class="w-full flex justify-center gap-4">
        <a href="{{ route('socialite.redirect', ['provider' => 'google']) }}" class="btn btn-error text-white btn-circle">
            <x-jam-google class="w-5 h-5" />
          </a>
        <a href="{{ route('socialite.redirect', ['provider' => 'github']) }}" class="btn btn-primary btn-circle">
            <x-jam-github class="w-5 h-5"/>
          </a>
    </div>
</x-guest-layout>
