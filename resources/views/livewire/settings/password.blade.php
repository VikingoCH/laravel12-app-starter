<section class="w-full">
    @include('partials.page-heading')

    <x-settings.layout :heading="__('Update password')" :subheading="__('Ensure your account is using a long, random password to stay secure')">
        <x-form wire:submit="updatePassword">
            <x-password label="{{ __('Current password') }}" right wire:model="current_password" />
            <x-password label="{{ __('New password') }}" right wire:model="password" />
            <x-password label="{{ __('Confirm Password') }}" right wire:model="password_confirmation" />
            <x-button class="btn-secondary w-full" type="submit">{{ __('Save') }}</x-button>

        </x-form>
    </x-settings.layout>
</section>
