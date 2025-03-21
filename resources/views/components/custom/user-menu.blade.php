<x-dropdown>
    <x-slot:trigger>
        {{-- <x-avatar :placeholder="auth()->user()->initials()" :subtitle="auth()->user()->email" :title="auth()->user()->name" /> --}}
        <span class="cursor-pointer">
            <x-avatar :placeholder="auth()->user()->initials()" :title="auth()->user()->name" />
        </span>
    </x-slot:trigger>
    <x-menu-item :href="route('settings.profile')" icon="o-user" title="Profile" />
    <x-menu-separator />
    <x-menu-item :href="route('logout')" icon="o-power" title="Log Out" />
</x-dropdown>
