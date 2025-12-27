<div x-data="{ sidebarOpen: false }">
    <div class="flex gap-4 mb-8">
        <livewire:shared.filter-input wire:model.live.debounce.500ms="query" label="post" />
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
                                    <input
                                        type="checkbox"
                                        wire:model.live="selectedTags"
                                        value="{{ $tag }}"
                                        class="peer appearance-none w-5 h-5 rounded-md border border-white/10 bg-white/5 checked:bg-laravel-red checked:border-laravel-red transition-all cursor-pointer"
                                    >
                                    <svg class="absolute w-3 h-3 text-white opacity-0 peer-checked:opacity-100 left-1 transition-opacity pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="ml-3 text-sm text-zinc-400 group-hover:text-zinc-200 transition-colors uppercase font-bold tracking-tight">
                                        {{ $tag }}
                                    </span>
                                <span class="ml-auto text-xs font-mono text-zinc-500 group-hover:text-laravel-red transition-colors">
                                        ({{ $tag }})
                                    </span>
                            </label>
                        @endforeach
                    </div>
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
