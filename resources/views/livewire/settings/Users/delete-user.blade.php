<section class="w-full">
    @include('partials.page-heading')

    <x-settings.layout :heading="__('Are you sure you want to delete this account?')" :subheading="__(
        'Once this account is deleted, all of its resources and data will be permanently deleted. Please enter admin password to confirm you would like to permanently delete the account.',
    )">
        <div class="text-lg">
            <p>{{ __('Account Details') }}</p>
            <ul class="list-inside list-disc">
                <li>{{ __('Name') }}: {{ $user->name }}</li>
                <li>{{ __('Email') }}: {{ $user->email }}</li>
            </ul>
        </div>
        <x-form wire:submit="deleteUser">
            @csrf
            <x-password label="{{ __('Password') }}" right wire:model="password" />
            <x-slot:actions>
                <x-button class="grow" label="{{ __('Cancel') }}" link="{{ route('settings.users.list') }}" />
                <x-button class="btn-error grow" label="{{ __('confirm') }}" type="submit" />
            </x-slot:actions>
        </x-form>

    </x-settings.layout>
</section>
