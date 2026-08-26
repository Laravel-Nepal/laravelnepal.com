<x-layouts.app>
    <livewire:sections::landing-page.hero-section />
    <x-section.landing-page.posts-and-news />
    <livewire:sections::landing-page.tips-list />
    <livewire:sections::landing-page.projects-and-packages />
    @push('seo')
        @php
            $page = \App\Models\Page::whereType(\App\Enums\PageType::LandingPage)->first();
            views($page)->record();
        @endphp

        {!! seo($page) !!}
    @endpush
</x-layouts.app>
