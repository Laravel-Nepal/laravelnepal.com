<div
    class="glass p-8 rounded-4xl flex flex-col justify-between group/series hover:border-laravel-red/50 transition-all duration-500 w-full relative overflow-hidden"
>
    <div class="absolute -top-6 -right-6 opacity-[0.03] group-hover/series:opacity-[0.08] transition-opacity pointer-events-none select-none">
        <span class="text-8xl font-black italic uppercase tracking-tighter text-nowrap text-white">
            {{ $series->title }}
        </span>
    </div>

    <a href="{{ route('page.series.view', $series) }}" class="absolute inset-0 z-10" aria-label="View Series"></a>

    <div class="relative z-20 pointer-events-none">
        <div class="flex justify-between items-start mb-6">
            <div class="flex flex-wrap gap-2">
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
            <p class="text-zinc-400 text-sm leading-relaxed line-clamp-2 mb-6">
                {{ $series->description }}
            </p>
        @endif
    </div>

    <hr class="border-white/5 mb-4 relative z-20">

    <div class="mt-auto relative z-20 flex items-center justify-between pointer-events-none">
        <div class="flex items-center gap-3">
            <p class="text-zinc-400 text-xs font-bold">
                {{ $series->author->name }}
            </p>
            <span class="text-white/10 text-xs">•</span>
            <div class="flex items-center gap-1.5">
                <span class="text-laravel-red font-mono text-xs font-bold">{{ $series->post_count ?? 0 }}</span>
                <span class="text-zinc-500 text-[10px] font-bold uppercase tracking-tight">
                    {{ Str::plural('Post', $series->post_count ?? 0) }}
                </span>
            </div>
        </div>

        <div class="flex items-center gap-1 text-[10px] font-black uppercase text-laravel-red group-hover/series:translate-x-1 transition-transform pointer-events-auto">
            View Series <span>→</span>
        </div>
    </div>
</div>
