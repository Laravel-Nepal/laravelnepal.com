<div class="relative flex-1 group">
    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-zinc-600 group-focus-within:text-laravel-red transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>
    <input
        wire:model="value"
        type="text"
        placeholder="Search {{ $label }}s..."
        class="w-full bg-white/5 border border-white/5 rounded-2xl py-4 pl-12 pr-4 text-white focus:outline-none focus:border-laravel-red/50 focus:ring-1 focus:ring-laravel-red/20 transition-all shadow-inner"
    />
</div>
