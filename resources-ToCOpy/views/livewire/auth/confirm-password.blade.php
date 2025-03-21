<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $password = '';

    /**
     * Confirm the current user's password.
     */
    public function confirmPassword(): void
    {
        $this->validate([
            'password' => ['required', 'string'],
        ]);

        if (
            !Auth::guard('web')->validate([
                'email' => Auth::user()->email,
                'password' => $this->password,
            ])
        ) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);

        // $this->redirectIntended(default: route('home', absolute: false), navigate: true);
        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :description="__('This is a secure area of the application. Please confirm your password before continuing.')" :title="__('Confirm password')" />

    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" class="text-center" />

    <x-form class="flex flex-col gap-6" wire:submit="confirmPassword">
        <!-- Password -->
        <x-password label="{{ __('Password') }}" placeholder="{{ __('Password') }}" required right wire:model="password" />
        {{-- <flux:input :label="__('Password')" :placeholder="__('Password')" autocomplete="new-password" required
            type="password" wire:model="password" /> --}}

        {{-- <flux:button class="w-full" type="submit" variant="primary">{{ __('Confirm') }}</flux:button> --}}
        <x-button class="btn-accent w-full" type="submit">{{ __('Confirm') }}</x-button>

    </x-form>
</div>
