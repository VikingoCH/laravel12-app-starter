<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>{{ config('app.name', 'laravel') }}</title>
        <link href="https://fonts.bunny.net" rel="preconnect">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-white antialiased">
        <div class="relative grid h-dvh items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
            <div class="hidden h-full w-full bg-neutral-600 p-10 text-white lg:flex lg:flex-col">
                <a class="relative z-20 flex items-center text-lg font-medium" href="{{ route('home') }}" wire:navigate>
                    <span class="flex h-10 w-10 items-center justify-center rounded-md">
                        <x-app-logo-icon class="mr-2 h-7 fill-current text-white" />
                    </span>
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <div class="p-4 text-6xl font-bold">Welcome</div>
                <div class="ml-25 p-8 text-5xl font-bold text-yellow-200">Bem-vindo</div>
                <div class="ml-10 p-4 text-7xl font-bold text-red-400">Benvenuto</div>
                <div class="ml-20 p-4 text-6xl font-bold text-cyan-300">Bienvenido</div>
                <div class="ml-15 p-4 text-7xl font-bold text-green-300">Willkommen</div>
            </div>
            <div class="flex h-full w-full flex-col justify-center bg-white lg:p-8">
                <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                    <a class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" href="{{ route('home') }}"
                        wire:navigate>
                        <span class="flex h-9 w-9 items-center justify-center rounded-md">
                            <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                        </span>

                        <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>

</html>
