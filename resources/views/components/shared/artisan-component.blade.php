<div
    class="glass p-8 rounded-4xl flex flex-col justify-between group/artisan hover:border-laravel-red/50 transition-all duration-500 w-full relative overflow-hidden"
>
    <div class="absolute -top-6 -right-6 opacity-[0.03] group-hover/artisan:opacity-[0.1] transition-opacity pointer-events-none select-none">
        <span class="text-7xl font-black italic uppercase tracking-tighter text-white">
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

            <div class="flex gap-3 pointer-events-auto">
                @if($author->github)
                    <a href="https://github.com/{{ $author->github }}" target="_blank" class="text-zinc-500 hover:text-white transition-colors relative z-30">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.041-1.416-4.041-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" /></svg>
                    </a>
                @endif
                @if($author->x)
                    <a href="https://x.com/{{ $author->x }}" target="_blank" class="text-zinc-500 hover:text-white transition-colors relative z-30">
                        <svg class="w-4 h-4 fill-current mt-0.5" viewBox="0 0 24 24"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>
                    </a>
                @endif
                @if($author->linkedin)
                    <a href="https://linkedin.com/in/{{ $author->linkedin }}" target="_blank" class="text-zinc-500 hover:text-white transition-colors relative z-30">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.35V9h3.414v1.561h.049c.476-.9 1.637-1.852 3.37-1.852 3.602 0 4.268 2.37 4.268 5.455v6.288zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.064 2.063-2.064s2.063.926 2.063 2.064c0 1.139-.92 2.065-2.063 2.065zm1.777 13.019H3.56V9h3.554v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.226.792 24 1.771 24h20.451C23.2 24 24 23.226 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/></svg>
                    </a>
                @endif
            </div>
        </div>

        <h3 class="text-2xl font-black mb-1 group-hover/artisan:text-laravel-red transition-colors">
            {{ $author->name }}
        </h3>
        <p class="text-laravel-red/60 text-[10px] font-mono font-bold uppercase tracking-widest mb-4 italic">
            @<span></span>{{ $author->username }}
        </p>

        <p class="text-zinc-400 text-sm leading-relaxed line-clamp-2 mb-6">
            {{ $author->bio ?? 'Artisan contributor at Laravel Nepal.' }}
        </p>
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
