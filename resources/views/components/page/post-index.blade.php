<x-layouts.app>
    <div class="container relative min-h-screen pt-20 pb-40">
        <x-shared.back-to-landing-page />

        <header class="mb-16 space-y-8">
            <x-shared.bread-crumb :$breadCrumb />

            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-[0.9] tracking-tighter">
                Posts
            </h1>

            <hr class="border-white/5" />
        </header>

        <livewire:filter-posts />
    </div>
    @push('seo')
        {!! seo($page) !!}
    @endpush
</x-layouts.app>
