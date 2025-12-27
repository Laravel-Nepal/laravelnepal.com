<x-layouts.app>
    <div
        x-data="{ percent: 0 }"
        @scroll.window="percent = (window.pageYOffset / (document.body.scrollHeight - window.innerHeight)) * 100"
        class="fixed top-0 left-0 w-full h-1 z-[110]"
    >
        <div class="h-full bg-laravel-red transition-all duration-150" :style="`width: ${percent}%`"></div >
    </div>
    <div class="container relative min-h-screen pt-20 pb-40">
        <div class="mb-12">
            <a href="{{ route('page.landingPage') }}" class="group flex items-center gap-2 text-zinc-500 hover:text-laravel-red transition-all">
                <span class="group-hover:-translate-x-1 transition-transform">←</span>
                <span class="text-[10px] font-black uppercase tracking-widest">Back to Landing Page</span>
            </a>
        </div>

        <article>
            <header class="mb-16 space-y-8">
                <nav class="flex mb-8 text-[10px] font-bold uppercase tracking-widest text-zinc-500" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li><a href="/" class="hover:text-laravel-red">Home</a></li>
                        <li><span class="px-2">/</span></li>
                        <li><a href="#feed" class="hover:text-laravel-red">Blog</a></li>
                        <li><span class="px-2">/</span></li>
                        <li class="text-zinc-300" aria-current="page">Technical Insight</li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-[0.9] tracking-tighter">
                    {{ $post->title }}
                </h1>

                <hr class="border-white/5" />

                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-3">
                        <img
                            alt="{{ $post->author->name }}"
                            class="w-10 h-10 rounded-full border border-laravel-red/20"
                            src="{{ $post->author->avatar }}"
                        />
                        <div>
                            <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">Author</p>
                            <p class="text-sm font-bold mt-1">{{ $post->author->name }}</p>
                        </div>
                    </div>

                    <div class="h-8 w-px bg-white/5"></div>

                    <div>
                        <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">Published</p>
                        <p class="text-sm font-bold mt-1 text-zinc-300">
                            {{ $post->date->format('M d, Y') }}
                        </p>
                    </div>

                    <div class="h-8 w-px bg-white/5"></div>

                    <div>
                        <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">Estimated</p>
                        <p class="text-sm font-bold mt-1 text-zinc-300">
                            {{ $post->minutes_read_text }}
                        </p>
                    </div>
                </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-4">
                <div class="lg:col-span-8">
                    <div class="glass p-8 md:p-12 rounded-[3rem] relative overflow-hidden">
                        <div class="absolute -top-24 -left-24 w-64 h-64 bg-laravel-red/5 blur-[100px] pointer-events-none"></div>

                        <div class="format max-w-none">
                            {!! Str::markdown($post->content) !!}
                        </div>
                    </div>
                </div>
                <aside class="lg:col-span-4 space-y-8">
                    <div class="sticky top-12 flex flex-col gap-4">
                        <x-shared.tags-glass :tags="$post->tags" />
                    </div>
                </aside>
            </div>
        </article>
    </div>

    @push('scripts')
        <script defer src="//cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush
</x-layouts.app>

