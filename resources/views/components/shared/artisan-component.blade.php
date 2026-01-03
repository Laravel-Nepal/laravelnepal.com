<div
    class="glass p-8 rounded-4xl flex flex-col justify-between group/artisan hover:border-laravel-red/50 transition-all duration-500 w-full relative overflow-hidden"
>
    <div class="absolute -top-6 -right-6 opacity-[0.03] group-hover/artisan:opacity-[0.1] transition-opacity pointer-events-none select-none overflow-x-hidden">
        <span class="text-7xl font-black italic uppercase tracking-tighter text-nowrap text-white">
            {{ $author->username }}
        </span>
    </div>

    <a href="{{ route('page.artisan.view', $author) }}" class="absolute inset-0 z-10" aria-label="View {{ $author->name }}'s Profile"></a>

    <div class="relative z-20 pointer-events-none">
        <div class="flex justify-between items-start mb-6">
            <div class="relative">
                <div class="absolute inset-0 bg-laravel-red/20 blur-xl rounded-full opacity-0 group-hover/artisan:opacity-100 transition-opacity"></div>
                <img
                    src="{{ $author->avatar }}"
                    alt="{{ $author->name }}"
                    class="relative w-16 h-16 rounded-2xl border border-white/10 object-cover group-hover/artisan:border-laravel-red/50 transition-colors"
                >
            </div>

            <div class="flex items-center gap-3 pointer-events-auto">
                @if($author->website)
                    <a href="{{ $author->website }}" target="_blank" class="text-zinc-500 hover:text-white transition-colors relative z-30">
                        {{ svg('fas-arrow-up-right-from-square', 'w-5 h-5 fill-current') }}
                    </a>
                @endif
                @if($author->github)
                    <a href="https://github.com/{{ $author->github }}" target="_blank" class="text-zinc-500 hover:text-white transition-colors relative z-30">
                        {{ svg('fab-github', 'w-6 h-6 fill-current') }}
                    </a>
                @endif
                @if($author->x)
                    <a href="https://x.com/{{ $author->x }}" target="_blank" class="text-zinc-500 hover:text-white transition-colors relative z-30">
                        {{ svg('fab-x-twitter', 'w-6 h-6 fill-current') }}
                    </a>
                @endif
                @if($author->linkedin)
                    <a href="https://linkedin.com/in/{{ $author->linkedin }}" target="_blank" class="text-zinc-500 hover:text-white transition-colors relative z-30">
                        {{ svg('fab-linkedin', 'w-6 h-6 fill-current') }}
                    </a>
                @endif
            </div>
        </div>

        <h3 class="text-2xl font-black mb-1 group-hover/artisan:text-laravel-red transition-colors">
            {{ $author->name }}
        </h3>
        <p class="text-laravel-red text-xs font-mono font-bold uppercase tracking-widest mb-4 italic">
            @<span></span>{{ $author->username }}
        </p>
        @if($author->bio)
            <p class="text-zinc-400 text-sm leading-relaxed line-clamp-2 mb-6">
                {{ $author->bio }}
            </p>
        @endif
    </div>

    <hr class="border-white/5 mb-4 relative z-20">

    <div class="mt-auto relative z-20 flex items-center justify-between pointer-events-none">
        <div class="flex items-center gap-4 text-zinc-500 text-[10px] font-bold uppercase tracking-tighter">
            <div class="flex items-center gap-1">
                <span class="text-zinc-300">{{ $author->posts_count ?? 0 }}</span> Articles
            </div>
            <div class="h-3 w-px bg-white/10"></div>
            <div class="flex items-center gap-1">
                <span class="text-zinc-300">{{ $author->projects_count ?? 0 }}</span> Projects
            </div>
            <div class="h-3 w-px bg-white/10"></div>
            <div class="flex items-center gap-1">
                <span class="text-zinc-300">{{ $author->tips_count ?? 0 }}</span> Tips
            </div>
            <div class="h-3 w-px bg-white/10"></div>
            <div class="flex items-center gap-1">
                <span class="text-zinc-300">{{ $author->packages_count ?? 0 }}</span> Packages
            </div>
        </div>
    </div>
</div>
