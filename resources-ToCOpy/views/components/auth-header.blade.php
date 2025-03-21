@props(['title', 'description'])

<div class="flex w-full flex-col text-center">
    <x-header separator subtitle="{{ __($description) }}" title="{{ __($title) }}" />
    {{-- <flux:heading size="xl">{{ $title }}</flux:heading>
    <flux:subheading>{{ $description }}</flux:subheading> --}}
</div>
