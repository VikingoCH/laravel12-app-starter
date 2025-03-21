<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('home', absolute: false), navigate: true);

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="mt-4 flex flex-col gap-6">
    <div class="text-center">
        {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="!dark:text-green-400 text-center font-medium !text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="flex flex-col items-center justify-between space-y-3">
        <x-button class="btn-accent w-full" label="{{ __('Resend verification email') }}" wire:click="sendVerification" />

        <x-button class="btn-ghost text-warning text-sm" label="{{ __('Log out') }}" wire:click="logout" />

        {{-- <flux:button class="w-full" variant="primary" wire:click="sendVerification">
            {{ __('Resend verification email') }}
        </flux:button>

        <flux:link class="cursor-pointer text-sm" wire:click="logout">
            {{ __('Log out') }}
        </flux:link> --}}
    </div>
</div>
