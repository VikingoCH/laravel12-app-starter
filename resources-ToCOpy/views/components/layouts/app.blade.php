<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover" name="viewport">
        <meta content="{{ csrf_token() }}" name="csrf-token">
        <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- @fluxAppearance --}}
    </head>

    <body class="bg-base-300 font-sans antialiased">

        {{-- The navbar with `sticky` and `full-width` --}}
        <x-nav full-width sticky>

            <x-slot:brand>
                {{-- Drawer toggle for "main-drawer" --}}
                <label class="mr-3 lg:hidden" for="main-drawer">
                    <x-icon class="cursor-pointer" name="o-bars-3" />
                </label>

                {{-- Brand --}}
                {{-- <div>App</div> --}}
                <x-app-brand />

            </x-slot:brand>

            {{-- Right side actions --}}
            <x-slot:actions>
                <div class="mr-20 text-2xl font-extrabold uppercase">
                    {{ $title ?? '' }}
                </div>

                {{-- <x-custom.navbar-title :title="$title" /> --}}
                {{-- <x-header :title="$title" size="text-xl" /> --}}
                <x-theme-toggle class="btn-ghost btn-sm" darkTheme="mydark" lightTheme="mylight" />
                <x-custom.user-menu />
                {{-- <x-button class="btn-ghost btn-sm" icon="o-envelope" label="Messages" link="###" responsive />
                <x-button class="btn-ghost btn-sm" icon="o-bell" label="Notifications" link="###" responsive /> --}}
            </x-slot:actions>
        </x-nav>

        {{-- The main content with `full-width` --}}
        <x-main full-width with-nav>

            {{-- This is a sidebar that works also as a drawer on small screens --}}
            {{-- Notice the `main-drawer` reference here --}}
            {{-- <x-slot:sidebar class="dark:bg-base-300 bg-[#fcfcfc]" collapsible drawer="main-drawer"> --}}
            <x-slot:sidebar class="bg-base-200" collapsible drawer="main-drawer">

                {{-- User --}}
                {{-- @if ($user = auth()->user())
                    <x-list-item :item="$user" class="pt-2" no-hover no-separator sub-value="email"
                        value="name">
                        <x-slot:actions>
                            <x-button class="btn-circle btn-ghost btn-xs" icon="o-power" link="/logout" no-wire-navigate
                                tooltip-left="logoff" />
                        </x-slot:actions>
                    </x-list-item>

                    <x-menu-separator />
                @endif --}}

                {{-- Activates the menu item when a route matches the `link` property --}}
                <x-menu :title="null" activate-by-route>
                    <x-menu-item icon="o-home" link="/" title="Home" />
                    <x-menu-item icon="o-envelope" link="###" title="Messages" />
                    <x-menu-sub icon="o-cog-6-tooth" title="Settings">
                        <x-menu-item icon="o-wifi" link="####" title="Wifi" />
                        <x-menu-item icon="o-archive-box" link="####" title="Archives" />
                    </x-menu-sub>
                </x-menu>
            </x-slot:sidebar>

            {{-- The `$slot` goes here --}}
            <x-slot:content>
                {{ $slot }}
            </x-slot:content>
        </x-main>

        {{--  TOAST area --}}
        <x-toast position="toast-bottom toast-end" />

        {{-- @fluxScripts --}}
    </body>

</html>
