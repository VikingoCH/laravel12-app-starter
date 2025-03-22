<section class="w-full">
    @include('partials.page-heading')
    <x-settings.layout :heading="__('Delete account')" :subheading="__('Delete your account and all of its resources')">

        <x-modal
            subtitle="{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}"
            title="{{ __('Are you sure you want to delete your account?') }}" wire:model="delModal">
            <x-form no-separator wire:submit="deleteUser">
                @csrf
                <x-password label="{{ __('Password') }}" right wire:model="password" />
                {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
                <x-slot:actions>
                    <x-button @click="$wire.delModal = false" class="grow" label="{{ __('Cancel') }}" />
                    <x-button class="btn-error grow" label="{{ __('Confirm') }}" type="submit" />
                </x-slot:actions>
            </x-form>
        </x-modal>

        <x-button @click="$wire.delModal = true" class="btn-error w-full" label="{{ __('Delete account') }}" />
    </x-settings.layout>
</section>
