<x-layouts.app :title="__('Home')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            {{-- <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700"> --}}
            <x-card class="flex flex-col" separator shadow title="Button Styles">

                <p class="text-xl font-bold uppercase">Colors</p>
                {{-- <div class="flex flex-row gap-4"> --}}
                <x-button label="Default" />
                <x-button class="btn-primary" label="Primary" />
                <x-button class="btn-secondary" label="Secondary " />
                <x-button class="btn-accent" label="Accent " />
                <x-button class="btn-info" label="Info " />
                <x-button class="btn-success" label="Succes" />
                <x-button class="btn-warning" label="Warning" />
                <x-button class="btn-error my-2" label="Error" />
                {{-- </div> --}}
                <p class="pt-10 text-xl font-bold uppercase">Sizes</p>
                <div class="flex flex-row gap-4">
                    <x-button class="btn-sm" label="Small" />
                    <x-button class="btn-md" label="MD" />
                    <x-button class="btn-xl" label="XL" />
                </div>
            </x-card>
            {{-- </div> --}}
            <x-card class="rounded-xl border border-neutral-200 dark:border-neutral-700" separator shadow
                title="Form Inputs">
                <x-input hint="Your full name" icon="o-user" label="Name" placeholder="Your name"
                    wire:model="name" />

                <x-input icon-right="o-map-pin" label="Right icon" wire:model="address" />

            </x-card>
        </div>
    </div>
</x-layouts.app>
