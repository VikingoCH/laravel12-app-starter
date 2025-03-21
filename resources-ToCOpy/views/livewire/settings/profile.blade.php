<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new class extends Component {
    public string $name = '';
    public string $email = '';
    use Toast;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // $this->dispatch('profile-updated', name: $user->name);

        $this->success('Saved');
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            // $this->redirectIntended(default: route('dashboard', absolute: false));
            $this->redirectIntended(default: route('home', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section class="w-full">
    @include('partials.page-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        {{-- <form class="my-6 w-full space-y-6" wire:submit="updateProfileInformation"> --}}
        <x-form wire:submit="updateProfileInformation">
            {{-- <flux:input :label="__('Name')" autocomplete="name" autofocus required type="text" wire:model="name" /> --}}
            <x-input autofocus icon="o-user" label="{{ __('Name') }}" placeholder="name" required wire:model="name" />

            <div>
                {{-- <flux:input :label="__('Email')" autocomplete="email" required type="email" wire:model="email" /> --}}
                <x-input icon="o-at-symbol" label="{{ __('Email') }}" placeholder="email" required type="email"
                    wire:model="email" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                    <div>
                        <x-alert class="alert-info alert-soft mt-2"
                            description="{{ __('click on send it link to re-send verificaiton Email') }}"
                            icon="o-exclamation-triangle" title="{{ __('Your email address is unverified.') }}">
                            <x-slot:actions>
                                <x-button class="btn-ghost" label="{{ __('send it!') }}"
                                    tooltip-bottom="{{ __('Click here to re-send the verification email.') }}"
                                    wire:click.prevent="resendVerificationNotification" />
                            </x-slot:actions>
                        </x-alert>
                        {{-- <flux:text class="mt-4">
                            {{ __('Your email address is unverified.') }}

                            <flux:link class="cursor-pointer text-sm"
                                wire:click.prevent="resendVerificationNotification">
                                {{ __('Click here to re-send the verification email.') }}
                            </flux:link>
                        </flux:text> --}}

                        @if (session('status') === 'verification-link-sent')
                            <x-alert class="alert-success alert-soft mt-2 font-bold" icon="o-check-circle"
                                title="{{ __('A new verification link has been sent to your email address.') }}" />
                            {{-- <flux:text class="!dark:text-green-400 mt-2 font-medium !text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </flux:text> --}}
                        @endif
                    </div>
                @endif
            </div>
            <x-button class="btn-primary w-full" type="submit">{{ __('Save') }}</x-button>

            {{-- <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                </div> --}}

            {{-- <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message> --}}
            {{-- </div> --}}
        </x-form>

        {{-- <livewire:settings.delete-user-form /> --}}
    </x-settings.layout>
</section>
