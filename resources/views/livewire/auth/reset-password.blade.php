<div class="flex flex-col gap-6">
    <x-auth-header :description="__('Please enter your new password below')" :title="__('Reset password')" />

    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" class="text-center" />

    <x-form wire:submit="resetPassword">
        <!-- Email Address -->
        <x-input icon="o-at-symbol" label="{{ __('Email address') }}" placeholder="email@example.com" required
            type="email" wire:model="email" />
        <!-- Password -->
        <x-password label="{{ __('Password') }}" placeholder="{{ __('Password') }}" required right
            wire:model="password" />

        <!-- Confirm Password -->
        <x-password label="{{ __('Confirm password') }}" placeholder="{{ __('Confirm password') }}" required right
            wire:model="password_confirmation" />

        <x-button class="btn-accent w-full" label="{{ __('Reset password') }}" type="submit" />
    </x-form>
</div>
