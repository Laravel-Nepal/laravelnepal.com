<x-layouts.app>
    <div class="container relative min-h-screen pt-20 pb-40">
        <x-shared.back-to-landing-page />
        <article>
            <header class="mb-16 space-y-8">
                <x-shared.bread-crumb :$breadCrumb />

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-[0.9] tracking-tighter">
                    {{ $tip->title }}
                </h1>

                <hr class="border-white/5" />

                <div class="flex items-center gap-6">
                    <a href="{{ route('page.artisan.view', $tip->author) }}" class="flex items-center gap-3 group/artisan">
                        <div class="relative">
                            <div class="absolute inset-0 bg-laravel-red/20 blur-md rounded-full opacity-0 group-hover/artisan:opacity-100 transition-opacity"></div>
                            <img
                                alt="{{ $tip->author->name }}"
                                class="relative w-10 h-10 rounded-full border border-laravel-red/20 group-hover/artisan:border-laravel-red/50 transition-all object-cover"
                                src="{{ $tip->author->avatar }}"
                            />
                        </div>
                        <div>
                            <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">Artisan</p>
                            <p class="text-sm font-bold mt-1 group-hover/artisan:text-laravel-red transition-colors">
                                {{ $tip->author->name }}
                            </p>
                        </div>
                    </a>

                    <div class="h-8 w-px bg-white/5"></div>

                    <div>
                        <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">Published</p>
                        <p class="text-sm font-bold mt-1 text-zinc-300">
                            {{ $tip->date->format('M d, Y') }}
                        </p>
                    </div>

                    <div class="h-8 w-px bg-white/5"></div>

                    <div>
                        <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">Estimated</p>
                        <p class="text-sm font-bold mt-1 text-zinc-300">
                            {{ $tip->minutes_read_text }}
                        </p>
                    </div>
                </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-4">
                <div class="lg:col-span-8">
                    <div class="glass p-8 md:p-12 rounded-[3rem] relative overflow-hidden">
                        <div class="absolute -top-24 -left-24 w-64 h-64 bg-laravel-red/5 blur-[100px] pointer-events-none"></div>

                        <div class="prose prose-invert max-w-none prose-a:text-laravel-red prose-a:font-bold">
                            @markdown($tip->content)
                        </div>
                    </div>
                </div>
                <aside class="lg:col-span-4 space-y-8">
                    <div class="sticky top-12 flex flex-col gap-4">
                        <x-shared.tags-glass :tags="$tip->tags" />
                        <x-shared.share-glass />
                        <x-shared.subscribe-glass />
                    </div>
                </aside>
            </div>
        </article>
    </div>
    @push('seo')
        {!! seo($tip) !!}
    @endpush
</x-layouts.app>

