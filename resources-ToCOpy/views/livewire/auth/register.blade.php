<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('home', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :description="__('Enter your details below to create your account')" :title="__('Create an account')" />

    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" class="text-center" />

    <x-form wire:submit="register">
        <x-input icon="o-user" label="{{ __('Name') }}" placeholder="{{ __('Full name') }}" required wire:model="name"
            wire:model="name" />
        <x-input icon="o-at-symbol" label="{{ __('Email address') }}" placeholder="email@example.com" required
            type="email" wire:model="email" />
        <x-password label="{{ __('Password') }}" placeholder="{{ __('Password') }}" required right
            wire:model="password" />
        <x-password label="{{ __('Confirm password') }}" placeholder="{{ __('Confirm password') }}" required right
            wire:model="password_confirmation" />
        <x-button class="btn-accent w-full" label="{{ __('Create account') }}" type="submit" />

    </x-form>

    {{-- <form class="flex flex-col gap-6" wire:submit="register">
        <!-- Name -->
        <flux:input :label="__('Name')" :placeholder="__('Full name')" autocomplete="name" autofocus required
            type="text" wire:model="name" />

        <!-- Email Address -->
        <flux:input :label="__('Email address')" autocomplete="email" placeholder="email@example.com" required
            type="email" wire:model="email" />

        <!-- Password -->
        <flux:input :label="__('Password')" :placeholder="__('Password')" autocomplete="new-password" required
            type="password" wire:model="password" />

        <!-- Confirm Password -->
        <flux:input :label="__('Confirm password')" :placeholder="__('Confirm password')" autocomplete="new-password"
            required type="password" wire:model="password_confirmation" />

        <div class="flex items-center justify-end">
            <flux:button class="w-full" type="submit" variant="primary">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form> --}}

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <x-button class="btn-ghost text-warning" label="{{ __('Log in') }}" link="{{ route('login') }}" />

        {{-- <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link> --}}
    </div>
</div>
