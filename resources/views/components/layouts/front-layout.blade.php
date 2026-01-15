@props(['title' => '', 'breadCrumb' => [], 'header' => ''])

<x-layouts.app>
    <div class="container relative min-h-screen pt-20 pb-40">
        <x-shared.back-to-landing-page />

        <article>
            <header class="mb-16 space-y-8">
                <x-shared.bread-crumb :$breadCrumb />

                @if($title)
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-[0.9] tracking-tighter">
                        {{ $title }}
                    </h1>

                    <hr class="border-white/5" />
                @endif

                {!! $header !!}
            </header>

            {{ $slot }}
        </article>
    </div>
</x-layouts.app>
