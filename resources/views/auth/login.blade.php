<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me block mt-4 // inline-flex items-center//ms-2 text-sm text-gray-600 dark:text-gray-400// ms-3 //flex items-center justify-end mt-4-->
        <div class="login">
        <div class="validation">
            <label for="remember_me" class="remember_me">
                <input id="remember_me" type="checkbox" class="remember_me_box" name="remember">
                <span class="remember_me_span">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="forgot">
            @if (Route::has('password.request'))
                <a class="forgot_password" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="log_in">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        </div>
    </form>
</x-guest-layout>
