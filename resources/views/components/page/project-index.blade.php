<x-layouts.front-layout title="Projects" :$breadCrumb>
    <livewire:filter-projects />
    @push('seo')
        {!! seo($page) !!}
    @endpush
</x-layouts.front-layout>
