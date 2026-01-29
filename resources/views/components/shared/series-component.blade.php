<div
    class="glass p-8 rounded-4xl flex flex-col justify-between group/series hover:border-laravel-red/50 transition-all duration-500 w-full relative overflow-hidden"
>
    <div class="absolute -top-4 -right-4 w-24 h-24 bg-laravel-red/5 blur-[60px] group-hover/series:bg-laravel-red/10 transition-colors"></div>

    <div class="absolute -top-6 -right-6 opacity-[0.03] group-hover/series:opacity-[0.08] transition-opacity pointer-events-none select-none">
        <span class="text-8xl font-black italic uppercase tracking-tighter text-white">
            Series
        </span>
    </div>

    <a href="#" class="absolute inset-0 z-10" aria-label="View Series"></a>

    <div class="relative z-20 pointer-events-none">
        <div class="flex justify-between items-start mb-6">
            <div class="flex flex-wrap gap-2">
                <span class="badge text-white! bg-laravel-red/20! border-laravel-red/30!">
                    {{ $series->posts_count ?? 0 }} {{ Str::plural('Part', $series->posts_count ?? 0) }}
                </span>
                @foreach($series->tags as $tag)
                    <span class="badge">{{ ucwords($tag) }}</span>
                @endforeach
            </div>

            <div class="text-zinc-500 group-hover/series:text-laravel-red transition-colors duration-300">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path d="M19 15v-3h-2v3h-3v2h3v3h2v-3h3v-2h-3zM15 8H3v2h12V8zm0-4H3v2h12V4zM3 14h8v-2H3v2z" />
                </svg>
            </div>
        </div>

        <h3 class="text-2xl font-black mb-3 group-hover/series:text-laravel-red transition-colors line-clamp-2">
            {{ $series->title }}
        </h3>

        @if($series->description)
            <p class="text-zinc-400 text-sm leading-relaxed line-clamp-3 mb-6">
                {{ $series->description }}
            </p>
        @endif
    </div>

    <hr class="border-white/5 mb-4 relative z-20">

    <div class="mt-auto relative z-20 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="text-zinc-400 text-xs font-bold">
                By {{ $series->author->name }}
            </span>
        </div>

        <div class="flex items-center gap-1 text-[10px] font-black uppercase text-laravel-red group-hover/series:translate-x-1 transition-transform">
            Start Learning <span>→</span>
        </div>
    </div>
</div>
