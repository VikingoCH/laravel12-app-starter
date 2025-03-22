<section class="w-full">
    @include('partials.page-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <x-form wire:submit="register">

            <x-input icon="o-user" label="{{ __('Name') }}" placeholder="{{ __('Full name') }}" required
                wire:model="name" wire:model="name" />

            <x-input icon="o-at-symbol" label="{{ __('Email address') }}" placeholder="email@example.com" required
                type="email" wire:model="email" />

            <x-password label="{{ __('Password') }}" placeholder="{{ __('Password') }}" required right
                wire:model="password" />

            <x-password label="{{ __('Confirm password') }}" placeholder="{{ __('Confirm password') }}" required right
                wire:model="password_confirmation" />

            <x-checkbox label="Admin rights" wire:model="isAdmin" />

            <x-button class="btn-secondary w-full" label="{{ __('Create account') }}" type="submit" />
        </x-form>
    </x-settings.layout>
</section>
