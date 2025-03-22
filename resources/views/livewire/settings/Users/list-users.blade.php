<section class="w-full">
    @include('partials.page-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <div class="flex items-center justify-end">
            <x-button class="btn-primary" link="{{ route('settings.users.register') }}">{{ __('New User') }}</x-button>
        </div>
        <x-table :headers="$headers" :rows="$users">

            @scope('cell_is_admin', $user)
                {{ $user->is_admin ? __('Admin') : __('User') }}
            @endscope

            @scope('actions', $user)
                <div class="flex items-center space-x-2">
                    <x-button class="btn-xs btn-ghost text-secondary" icon="o-pencil"
                        link="{{ route('settings.users.edit', ['id' => $user->id]) }}" spinner />
                    <x-button class="btn-xs btn-ghost text-error" icon="o-trash"
                        link="{{ route('settings.users.delete', ['id' => $user->id]) }}" spinner />
                </div>
            @endscope
        </x-table>
    </x-settings.layout>
</section>
