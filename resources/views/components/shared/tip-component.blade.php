<a
    class="glass p-6 rounded-4xl flex flex-col justify-between group/tip cursor-pointer hover:border-laravel-red/50 transition-all h-full w-full"
    href="{{ route('page.tips.view', $tip) }}"
>
    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-laravel-red blur-[80px] opacity-0 group-hover/tip:opacity-30 transition-opacity"></div>
    <div class="flex flex-wrap justify-between items-center mb-6 w-full gap-y-4">
        <div class="text-zinc-500 text-xs font-mono uppercase tracking-widest">
            {{ $tip->date->format('M d, Y') }}
        </div>
        <div class="flex flex-wrap justify-end gap-2">
            @foreach($tip->tags as $tag)
                <span class="badge">
                    {{ strtoupper($tag) }}
                </span>
            @endforeach
        </div>
    </div>

    <div class="flex-1">
        <h3 class="text-xl font-black leading-tight group-hover/tip:text-laravel-red transition-colors line-clamp-3">
            {{ $tip->title }}
        </h3>
    </div>

    <div class="flex items-center justify-between mt-8 pt-4 border-t border-white/5 group-hover/tip:border-laravel-red/10">
        <div class="flex items-center gap-2">
            <span class="text-zinc-400 text-xs font-bold">
                {{ $tip->author->name }}
            </span>
        </div>
        <div class="text-[10px] font-black uppercase text-laravel-red group-hover/tip:translate-x-2 transition-transform flex items-center gap-1">
            Read <span>→</span>
        </div>
    </div>
</a>
