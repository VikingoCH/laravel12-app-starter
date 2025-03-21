<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        // $this->redirectIntended(default: route('home', absolute: false), navigate: true);
        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :description="__('Enter your email and password below to log in')" :title="__('Log in to your account')" />

    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" class="text-center" />
    <x-form wire:submit="login">
        <x-input icon="o-at-symbol" label="{{ __('Email address') }}" placeholder="email@example.com" required
            type="email" wire:model="email" />
        <div class="relative">

            <x-password label="{{ __('Password') }}" placeholder="{{ __('Password') }}" required right
                wire:model="password" />
            @if (Route::has('password.request'))
                <x-button class="btn-ghost text-success absolute right-0 top-0 text-sm"
                    label="{{ __('Forgot your password?') }}" link="{{ route('password.request') }}" />
            @endif
        </div>
        <x-checkbox label="{{ __('Remember me') }}" wire:model="remember" />
        <x-button class="btn-accent w-full" label="{{ __('Log in') }}" type="submit" />
    </x-form>

    {{-- <form class="flex flex-col gap-6" wire:submit="login">
        <!-- Email Address -->
        <flux:input :label="__('Email address')" autocomplete="email" autofocus placeholder="email@example.com" required
            type="email" wire:model="email" />

        <!-- Password -->
        <div class="relative">
            <flux:input :label="__('Password')" :placeholder="__('Password')" autocomplete="current-password" required
                type="password" wire:model="password" />

            @if (Route::has('password.request'))
                <flux:link :href="route('password.request')" class="absolute right-0 top-0 text-sm" wire:navigate>
                    {{ __('Forgot your password?') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox :label="__('Remember me')" wire:model="remember" />

        <div class="flex items-center justify-end">
            <flux:button class="w-full" type="submit" variant="primary">{{ __('Log in') }}</flux:button>
        </div>
    </form> --}}

    @if (Route::has('register'))
        <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Don\'t have an account?') }}
            <x-button class="btn-ghost text-warning" label="{{ __('Sign up') }}" link="{{ route('register') }}" />
            {{-- <flux:link :href="route('register')" wire:navigate>{{ __('Sign up') }}</flux:link> --}}
        </div>
    @endif
</div>
