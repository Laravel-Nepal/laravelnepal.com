<div class="glass p-8 rounded-4xl space-y-8">
    <div>
        <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-neutral-400 mb-6">Filter by {{ $label }}</h4>
        <div class="flex flex-col gap-3">
            @foreach($arrayValues as $arrayValue)
                <label class="flex items-center group cursor-pointer">
                    <div class="relative flex items-center">
                        <input
                            type="checkbox"
                            wire:model="value"
                            value="{{ $arrayValue['value'] }}"
                            class="peer appearance-none w-5 h-5 rounded-md border border-white/10 bg-white/5 checked:bg-laravel-red checked:border-laravel-red transition-all cursor-pointer"
                        >
                        <svg class="absolute w-3 h-3 text-white opacity-0 peer-checked:opacity-100 left-1 transition-opacity pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="ml-3 text-sm text-zinc-400 group-hover:text-zinc-200 transition-colors uppercase font-bold tracking-tight">
                        {{ $arrayValue['value'] }}
                    </span>
                    <span class="ml-auto text-xs font-mono text-zinc-500 group-hover:text-laravel-red transition-colors">
                        ({{ $arrayValue['bracketValue'] }})
                    </span>
                </label>
            @endforeach
        </div>
    </div>
</div>
