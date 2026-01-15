<x-layouts.front-layout title="Packages" :$breadCrumb>
    <livewire:filter-packages />
    @push('seo')
        {!! seo($page) !!}
    @endpush
</x-layouts.front-layout>
