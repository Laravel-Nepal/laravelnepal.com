<x-layouts.front-layout title="Artisans" :$breadCrumb>
    <livewire:filter-artisans />
    @push('seo')
        {!! seo($page) !!}
    @endpush
</x-layouts.front-layout>
