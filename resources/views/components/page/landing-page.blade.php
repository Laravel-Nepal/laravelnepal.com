<x-layouts.app>
    <x-section.landing-page.hero-section />
    <x-section.landing-page.posts-and-news />
    <x-section.landing-page.tips-list />
    <x-section.landing-page.projects-and-packages />
    @push('seo')
        @php($page = \App\Models\Page::whereType(\App\Enums\PageType::LandingPage)->first())
        {!! seo($page) !!}
    @endpush
</x-layouts.app>
