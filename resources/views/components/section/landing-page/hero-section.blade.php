<section class="relative min-h-screen flex items-center justify-center px-6 pt-10">
    <div class="container grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-7 space-y-8 animate__animated animate__fadeInLeft">
            <h1 class="text-4xl md:text-5xl font-black leading-none">
                Join Laravel Nepal.<br/>
                <span class="text-laravel-red">The Open Community</span> <br />
                <span>for Laravel Developers</span>
            </h1>

            <p class="text-zinc-400 text-lg max-w-xl leading-relaxed">
                A collaborative space for Laravel enthusiasts to share knowledge, build projects, and grow together in Nepal's thriving tech community.
            </p>

            <div class="flex flex-wrap gap-4 pt-4">
                <button class="button-red">
                    Join Community
                </button>
                <button class="button-outlined">
                    Explore
                </button>
            </div>
        </div>
        <x-section.landing-page.hero-section-right />
    </div>
</section>

@push('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endpush
