<div class="bg-base-100 flex items-start rounded-xl p-4 max-md:flex-col">
    <div class="mr-10 h-full w-full py-6 md:w-[220px] md:border-r">
        <x-menu activate-by-route>
            <x-menu-item link="{{ route('settings.profile') }}">{{ __('Profile') }}</x-menu-item>
            <x-menu-item link="{{ route('settings.password') }}">{{ __('Change Password') }}</x-menu-item>
            <x-menu-item link="{{ route('settings.delete') }}">{{ __('Delete Account') }}</x-menu-item>
        </x-menu>

        {{-- <flux:navlist>
            <flux:navlist.item :href="route('settings.profile')" wire:navigate>{{ __('Profile') }}</flux:navlist.item>
            <flux:navlist.item :href="route('settings.password')" wire:navigate>{{ __('Password') }}</flux:navlist.item> --}}
        {{-- <flux:navlist.item :href="route('settings.appearance')" wire:navigate>{{ __('Appearance') }} --}}
        {{-- </flux:navlist.item> --}}
        {{-- </flux:navlist> --}}

    </div>
    <x-separator class="md:hidden" />

    {{-- <flux:separator class="md:hidden" /> --}}

    <div class="flex-1 self-stretch max-md:pt-6">
        <x-header subtitle="{{ $subheading ?? '' }}" title="{{ $heading ?? '' }}" />
        {{-- <flux:heading>{{ $heading ?? '' }}</flux:heading> --}}
        {{-- <flux:subheading>{{ $subheading ?? '' }}</flux:subheading> --}}

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
