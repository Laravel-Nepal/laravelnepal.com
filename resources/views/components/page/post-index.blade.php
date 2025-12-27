<x-layouts.app>
    <div class="container relative min-h-screen pt-20 pb-40" x-data="{ sidebarOpen: false }">
        <x-shared.back-to-landing-page />

        <header class="mb-16 space-y-8">
            <x-shared.bread-crumb :$breadCrumb />

            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-[0.9] tracking-tighter">
                Posts
            </h1>

            <hr class="border-white/5" />
        </header>

        <div class="flex gap-4 mb-8">
            <div class="relative flex-1 group">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-zinc-600 group-focus-within:text-laravel-red transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input
                    type="text"
                    placeholder="Search posts..."
                    class="w-full bg-white/5 border border-white/5 rounded-2xl py-4 pl-12 pr-4 text-white focus:outline-none focus:border-laravel-red/50 focus:ring-1 focus:ring-laravel-red/20 transition-all shadow-inner"
                >
            </div>
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="lg:hidden glass px-6 rounded-2xl flex items-center gap-2 text-xs font-black uppercase tracking-widest text-zinc-400 hover:text-white transition-all"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" /></svg>
                Filter
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <aside
                class="lg:col-span-3 space-y-8 lg:sticky lg:top-12 transition-all duration-300"
                x-transition
                :class="sidebarOpen ? 'block' : 'hidden lg:block'"
            >
                <div class="glass p-8 rounded-4xl space-y-8">
                    <div>
                        <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-neutral-400 mb-6">Filter by Tags</h4>
                        <div class="flex flex-col gap-3">
                            @foreach($tags as $tag)
                                <label class="flex items-center group cursor-pointer">
                                    <div class="relative flex items-center">
                                        <input type="checkbox" class="peer appearance-none w-5 h-5 rounded-md border border-white/10 bg-white/5 checked:bg-laravel-red checked:border-laravel-red transition-all cursor-pointer">
                                        <svg class="absolute w-3 h-3 text-white opacity-0 peer-checked:opacity-100 left-1 transition-opacity pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-sm text-zinc-500 group-hover:text-zinc-200 transition-colors uppercase font-bold tracking-tight">
                                        {{ $tag }}
                                    </span>
                                    <span class="ml-auto text-[10px] font-mono text-zinc-700 group-hover:text-laravel-red transition-colors">
                                        ({{ $tag }})
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <hr class="border-white/5" />

                    <div>
                        <button class="text-[10px] font-black uppercase tracking-widest text-laravel-red hover:text-white transition-colors">
                            Clear All Filters
                        </button>
                    </div>
                </div>
            </aside>

            <main class="lg:col-span-9">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @forelse($posts as $post)
                        <x-shared.single-blog :$post />
                    @empty
                        <x-shared.empty-state icon="copy" label="posts" />
                    @endforelse
                </div>
            </main>
        </div>
    </div>
    @pushonce('scripts')
        <script defer src="//cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpushonce
</x-layouts.app>
