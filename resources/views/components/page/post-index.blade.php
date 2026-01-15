<x-layouts.front-layout title="Posts" :$breadCrumb>
    <livewire:filter-posts />
    @push('seo')
        {!! seo($page) !!}
    @endpush
</x-layouts.front-layout>
