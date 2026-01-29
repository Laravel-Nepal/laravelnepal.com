<a href="{{ route('page.series.post', [$series, $post]) }}"
   class="relative z-10 flex items-center gap-6 p-4 rounded-3xl border border-white/5 bg-white/2 hover:bg-white/5 hover:border-laravel-red/30 transition-all group">

    @if(! is_null($index))
        <div class="shrink-0 w-11 h-11 rounded-xl bg-black border border-white/10 flex items-center justify-center font-mono text-sm font-black text-zinc-500 group-hover:text-laravel-red group-hover:border-laravel-red/50 transition-colors">
            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
        </div>
    @endif

    <div class="grow">
        <h4 class="text-white font-bold group-hover:text-laravel-red transition-colors">
            {{ $post->title }}
        </h4>
        <p class="text-zinc-500 text-xs mt-1">
            {{ $post->minutes_read_text }} &middot; {{ $post->date->diffForHumans() }}
        </p>
    </div>

    <div class="mr-4 opacity-0 group-hover:opacity-100 transition-opacity">
        <svg class="w-5 h-5 text-laravel-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </div>
</a>
