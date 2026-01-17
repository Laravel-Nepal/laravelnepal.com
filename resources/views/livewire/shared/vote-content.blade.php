<div class="inline-flex items-center gap-2 group">
    <button
        wire:click="toggleVote"
        @class([
            "relative flex items-center gap-3 px-5 py-2.5 rounded-2xl transition-all duration-500 overflow-hidden border",
            "glass",
            $active
                ? "border-white/20 text-white"
                : "border-white/10 text-zinc-400 hover:text-white hover:border-white/20"
        ])
    >
        <div @class([
            "absolute inset-0 opacity-0 group-hover:opacity-20 transition-opacity duration-500 bg-gradient-to-r from-white/20 to-transparent pointer-events-none",
            "hidden" => $active
        ])></div>

        <svg
            @class([
                "w-5 h-5 transition-all duration-500 ease-out",
                "fill-laravel-red scale-110 rotate-[72deg]" => $active,
                "fill-none stroke-current" => !$active
            ])
            viewBox="0 0 24 24" stroke-width="2"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
        </svg>

        <div class="relative h-5 overflow-hidden font-mono font-bold flex flex-col items-center">
            <div
                class="transition-all duration-500 ease-out flex flex-col"
                style="transform: translateY(-{{ $active ? '20' : '0' }}px)"
            >
                <span class="h-5 flex items-center">{{ $active ? $count - 1 : $count }}</span>
                <span class="h-5 flex items-center">{{ $active ? $count : $count + 1 }}</span>
            </div>
        </div>
    </button>
</div>
