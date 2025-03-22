<!---- NOT USED ---->
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

        <x-checkbox label="Admin rights" wire:model="isAdmin" />

        <x-button class="btn-accent w-full" label="{{ __('Create account') }}" type="submit" />
    </x-form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <x-button class="btn-ghost text-warning" label="{{ __('Log in') }}" link="{{ route('login') }}" />
    </div>
</div>
