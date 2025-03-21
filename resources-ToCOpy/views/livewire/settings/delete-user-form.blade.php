<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';
    public bool $delModal = false;

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

{{-- <section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <flux:heading>{{ __('Delete account') }}</flux:heading>
        <flux:subheading>{{ __('Delete your account and all of its resources') }}</flux:subheading>
    </div> --}}

<section class="w-full">
    @include('partials.page-heading')
    <x-settings.layout :heading="__('Delete account')" :subheading="__('Delete your account and all of its resources')">

        <x-modal
            subtitle="{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}"
            title="{{ __('Are you sure you want to delete your account?') }}" wire:model="delModal">
            <x-form no-separator wire:submit="deleteUser">
                <x-password label="{{ __('Password') }}" right wire:model="password" />
                {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
                <x-slot:actions>
                    <x-button @click="$wire.delModal = false" class="grow" label="{{ __('Cancel') }}" />
                    <x-button class="btn-error grow" label="{{ __('Confirm') }}" type="submit" />
                </x-slot:actions>
            </x-form>
        </x-modal>

        <x-button @click="$wire.delModal = true" class="btn-error w-full" label="{{ __('Delete account') }}" />

        {{-- <flux:modal.trigger name="confirm-user-deletion"> --}}

        {{-- <flux:button variant="danger" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
            {{ __('Delete account') }}
        </flux:button> --}}
        {{-- </flux:modal.trigger> --}}

        {{-- blade-formatter-disable-next-line --}}
    {{-- <flux:modal :show="$errors -> isNotEmpty()" class="max-w-lg" focusable name="confirm-user-deletion"> --}}
        {{-- <form class="space-y-6" wire:submit="deleteUser"> --}}
        {{-- <div> --}}
        {{-- <flux:heading size="lg">{{ __('Are you sure you want to delete your account?') }}</flux:heading> --}}

        {{-- <flux:subheading>
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </flux:subheading> --}}
        {{-- </div> --}}

        {{-- <flux:input :label="__('Password')" type="password" wire:model="password" /> --}}

        {{-- <div class="flex justify-end space-x-2"> --}}
        {{-- <flux:modal.close> --}}
        {{-- <flux:button variant="filled">
                    {{ __('Cancel') }}</flux:button> --}}
        {{-- </flux:modal.close> --}}

        {{-- <flux:button type="submit" variant="danger">{{ __('Delete account') }}</flux:button> --}}
        {{-- </div> --}}
        {{-- </form> --}}
        {{-- </flux:modal> --}}
    </x-settings.layout>
</section>
