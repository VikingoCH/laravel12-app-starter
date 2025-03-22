<section class="w-full">
    @include('partials.page-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <x-form wire:submit="updateUser">
            @csrf
            <x-input autofocus icon="o-user" label="{{ __('Name') }}" placeholder="name" required wire:model="name" />
            <x-input icon="o-at-symbol" label="{{ __('Email') }}" placeholder="email" required type="email"
                wire:model="email" />
            <x-checkbox label="Admin rights" wire:model="isAdmin" />

            <x-button class="btn-secondary w-full" type="submit">{{ __('Save') }}</x-button>
        </x-form>

    </x-settings.layout>
</section>
