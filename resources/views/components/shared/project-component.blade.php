<div
    class="glass p-8 rounded-4xl flex flex-col justify-between group/project hover:border-laravel-red/50 transition-all duration-500 w-full relative overflow-hidden">
    <div
        class="absolute -top-6 -right-6 opacity-[0.03] group-hover/project:opacity-[0.1] transition-opacity pointer-events-none">
        <svg class="w-32 h-32 fill-white" viewBox="0 0 24 24">
            <path
                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.041-1.416-4.041-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
        </svg>
    </div>

    <a href="{{ route('page.project.view', $project) }}" class="absolute inset-0 z-10" aria-label="View Project"></a>

    <div class="relative z-20 pointer-events-none">
        <div class="flex justify-between items-start mb-6">
            <div class="flex flex-wrap gap-2">
                @foreach($project->tags as $tag)
                    <span
                        class="badge"
                    >
                        {{ ucwords($tag) }}
                    </span>
                @endforeach
            </div>
            <a href="https://github.com/{{ $project->github }}" target="_blank"
               class="text-zinc-500 hover:text-white group-hover/project:scale-125 transition-all duration-300 pointer-events-auto relative z-30"
               aria-label="View on GitHub"
            >
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.041-1.416-4.041-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
            </a>
        </div>

        <h3 class="text-2xl font-black mb-3 group-hover/project:text-laravel-red transition-colors">
            {{ $project->title }}
        </h3>
    </div>
    <hr class="border-white/5 mb-4 relative z-20">
    <div class="mt-auto space-y-6 relative z-20 pointer-events-none">
        <div class="flex items-center justify-between">
            <div class="flex gap-4">
                <p class="text-zinc-400 text-xs font-bold">
                    {{ $project->author->name }}
                </p>
            </div>
            <div class="flex gap-4 pointer-events-auto">
                <a
                    href="{{ $project->website }}"
                    target="_blank"
                    class="button-red small z-30 relative"
                >
                    Visit Website
                </a>
                <a href="{{ route('page.project.view', $project) }}"
                   class="button-outlined small z-30 relative">
                    Explore
                </a>
            </div>
        </div>
    </div>
</div>
