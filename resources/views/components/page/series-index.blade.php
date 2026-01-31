<x-layouts.front-layout title="Series" :$breadCrumb>
    <livewire:filter-series />
    @push('seo')
        {!! seo($page) !!}
    @endpush
</x-layouts.front-layout>
