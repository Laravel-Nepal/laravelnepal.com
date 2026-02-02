<div
    wire:loading.class="opacity-50 grayscale pointer-events-none"
    wire:target="toggleVote"
    class="flex items-center"
>
    <button
        wire:click="toggleVote"
        @class([
            "group/vote flex items-center gap-2.5 px-3 py-1.5 rounded-xl border transition-all duration-300 active:scale-95",
            "bg-laravel-red/10 border-laravel-red/30 shadow-[0_0_15px_rgba(239,68,68,0.1)]" => $contentIsVoted,
            "bg-white/[0.03] border-white/5 hover:border-white/10" => !$contentIsVoted,
        ])
    >
        <svg
            @class([
                "w-4 h-4 transition-all duration-300",
                "text-laravel-red scale-110" => $contentIsVoted,
                "text-zinc-500 group-hover/vote:text-zinc-300" => !$contentIsVoted,
            ])
            fill="currentColor"
            viewBox="0 0 24 24"
        >
            <path d="M12.781 2.375c-.381-.475-1.181-.475-1.562 0l-8 10A1.001 1.001 0 0 0 4 14h4v7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7h4a1.001 1.001 0 0 0 .781-1.625l-8-10z"/>
        </svg>

        <span
            @class([
                "text-xs font-mono font-bold tracking-tight transition-colors",
                "text-white" => $contentIsVoted,
                "text-zinc-500" => !$contentIsVoted,
            ])
        >
            {{ $totalVotes }}
        </span>
    </button>
</div>
