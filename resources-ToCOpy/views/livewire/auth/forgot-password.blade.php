<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :description="__('Enter your email to receive a password reset link')" :title="__('Forgot password')" />

    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" class="text-center" />

    <x-form wire:submit="sendPasswordResetLink">
        <x-input icon="o-at-symbol" label="{{ __('Email address') }}" placeholder="email@example.com" required
            type="email" wire:model="email" />
        <x-button class="btn-accent w-full" label="{{ __('Email password reset link') }}" type="submit" />

        <!-- Email Address -->
        {{-- <flux:input
            wire:model="email"
            :label="__('Email Address')"
            type="email"
            required
            autofocus
            placeholder="email@example.com"
        />

        <flux:button variant="primary" type="submit" class="w-full">{{ __('Email password reset link') }}</flux:button> --}}
    </x-form>

    <div class="space-x-1 text-center text-sm text-zinc-400">
        {{ __('Or, return to') }}
        <x-button class="btn-ghost text-warning" label="{{ __('Log in') }}" link="{{ route('login') }}" />

        {{-- <flux:link :href="route('login')" wire:navigate>{{ __('log in') }}</flux:link> --}}
    </div>
</div>
