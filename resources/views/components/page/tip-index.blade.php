<x-layouts.front-layout title="Tips" :$breadCrumb>
    <livewire:filter-tips />
    @push('seo')
        {!! seo($page) !!}
    @endpush
</x-layouts.front-layout>
