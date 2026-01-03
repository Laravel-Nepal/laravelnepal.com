<x-layouts.app>
    <div class="container relative min-h-screen pt-20 pb-40">
        <x-shared.back-to-landing-page />

        <article>
            <header class="mb-16 space-y-8">
                <x-shared.bread-crumb :$breadCrumb />

                <div class="flex flex-col md:flex-row md:items-center gap-6 md:gap-10">
                    <div class="relative group w-32 h-32 md:w-40 md:h-40">
                        <div class="absolute inset-0 bg-laravel-red/20 blur-2xl rounded-full group-hover:bg-laravel-red/30 transition-all"></div>
                        <img
                            alt="{{ $author->name }}"
                            class="relative w-full h-full rounded-[2.5rem] border-2 border-white/5 object-cover shadow-2xl"
                            src="{{ $author->avatar }}"
                        />
                    </div>

                    <div class="flex-1 space-y-4">
                        <h1 class="text-5xl md:text-7xl lg:text-8xl font-black leading-[0.8] tracking-tighter">
                            {{ $author->name }}
                        </h1>
                        <p class="text-laravel-red font-mono font-bold text-lg uppercase tracking-[0.2em]">
                            @<span></span>{{ $author->username }}
                        </p>
                        @if($author->bio)
                            <p class="text-zinc-400 text-sm md:text-base leading-relaxed max-w-3xl">
                                {{ $author->bio }}
                            </p>
                        @endif
                    </div>
                </div>

                <hr class="border-white/5" />

                <div class="flex flex-wrap items-center gap-6">
                    @if($author->website)
                        <div>
                            <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">Website</p>
                            <a href="{{ $author->website }}" target="_blank" class="text-sm font-bold mt-1 text-zinc-300 hover:text-white flex items-center gap-1 transition-colors">
                                {{ str_replace(['https://', 'http://'], '', $author->website) }}
                            </a>
                        </div>
                        <div class="h-8 w-px bg-white/5 hidden md:block"></div>
                    @endif

                    @if($author->github)
                        <div>
                            <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">GitHub</p>
                            <a href="https://github.com/{{ $author->github }}" target="_blank" class="text-sm font-bold mt-1 text-zinc-300 hover:text-white flex items-center gap-1 transition-colors">
                                {{ $author->github }}
                            </a>
                        </div>
                        <div class="h-8 w-px bg-white/5 hidden md:block"></div>
                    @endif

                    @if($author->x)
                        <div>
                            <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">X</p>
                            <a href="https://x.com/{{ $author->x }}" target="_blank" class="text-sm font-bold mt-1 text-zinc-300 hover:text-white flex items-center gap-1 transition-colors">
                                {{ $author->x }}
                            </a>
                        </div>
                        <div class="h-8 w-px bg-white/5 hidden md:block"></div>
                    @endif

                    @if($author->linkedin)
                        <div>
                            <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">LinkedIn</p>
                            <a href="https://linkedin.com/in/{{ $author->linkedin }}" target="_blank" class="text-sm font-bold mt-1 text-zinc-300 hover:text-white transition-colors">
                                {{$author->linkedin }}
                            </a>
                        </div>
                    @endif
                </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-12">
                <div class="lg:col-span-8 space-y-12">
                    <div class="glass p-8 md:p-12 rounded-[3rem] relative overflow-hidden">
                        <div class="absolute -top-24 -right-24 w-64 h-64 bg-laravel-red/5 blur-[100px] pointer-events-none"></div>

                        <h2 class="text-xs font-black uppercase tracking-[0.3em] text-zinc-500 mb-6">About the Artisan</h2>
                        <div class="prose prose-invert max-w-none prose-p:text-zinc-300 prose-p:leading-relaxed prose-p:text-lg">
                            @if($author->content)
                                @markdown($author->content)
                            @else
                                <p>{{ $author->bio }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-20 space-y-24">
                        @if($author->posts->isNotEmpty())
                            <x-layouts.section class="space-y-8">
                                <x-slot:title>
                                    <h3 class="text-2xl font-black tracking-tighter uppercase italic text-white">
                                        Published <span class="ml-2 text-laravel-red">Articles</span>
                                    </h3>
                                </x-slot:title>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
                                    @foreach($author->posts as $post)
                                        <x-shared.single-blog :$post />
                                    @endforeach
                                </div>
                            </x-layouts.section>
                        @endif

                        @if($author->tips->isNotEmpty())
                            <x-layouts.section class="space-y-8">
                                <x-slot:title>
                                    <h3 class="text-2xl font-black tracking-tighter uppercase italic text-white">
                                        Code <span class="ml-2 text-laravel-red">Tips</span>
                                    </h3>
                                </x-slot:title>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
                                    @foreach($author->tips as $tip)
                                        <x-shared.tip-component :$tip />
                                    @endforeach
                                </div>
                            </x-layouts.section>
                        @endif

                        @if($author->projects->isNotEmpty())
                            <x-layouts.section class="space-y-8">
                                <x-slot:title>
                                    <h3 class="text-2xl font-black tracking-tighter uppercase italic text-white">
                                        Featured <span class="ml-2 text-laravel-red">Projects</span>
                                    </h3>
                                </x-slot:title>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
                                    @foreach($author->projects as $project)
                                        <x-shared.project-component :$project />
                                    @endforeach
                                </div>
                            </x-layouts.section>
                        @endif

                        @if($author->packages->isNotEmpty())
                            <x-layouts.section class="space-y-8">
                                <x-slot:title>
                                    <h3 class="text-2xl font-black tracking-tighter uppercase italic text-white">
                                        OSS <span class="ml-2 text-laravel-red">Packages</span>
                                    </h3>
                                </x-slot:title>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
                                    @foreach($author->packages as $package)
                                        <x-shared.package-component :$package />
                                    @endforeach
                                </div>
                            </x-layouts.section>
                        @endif
                    </div>
                </div>

                <aside class="lg:col-span-4 space-y-8">
                    <div class="sticky top-12 flex flex-col gap-4">
                        <div class="glass p-8 rounded-[2.5rem] border border-white/5">
                            <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-zinc-500 mb-6">Contribution Stats</h4>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-zinc-400 text-sm font-bold">Articles</span>
                                    <span class="text-laravel-red font-mono font-bold">{{ $author->posts_count }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-zinc-400 text-sm font-bold">Tips</span>
                                    <span class="text-laravel-red font-mono font-bold">{{ $author->tips_count }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-zinc-400 text-sm font-bold">Packages</span>
                                    <span class="text-laravel-red font-mono font-bold">{{ $author->packages_count }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-zinc-400 text-sm font-bold">Projects</span>
                                    <span class="text-laravel-red font-mono font-bold">{{ $author->projects_count }}</span>
                                </div>
                            </div>
                        </div>

                        <x-shared.share-glass />
                        <x-shared.subscribe-glass />
                    </div>
                </aside>
            </div>
        </article>
    </div>
</x-layouts.app>
