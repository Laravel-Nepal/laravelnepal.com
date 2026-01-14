<div class="glass p-8 rounded-4xl space-y-8">
    <div class="space-y-2">
        <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-neutral-400">
            {{ $title ?? 'Newsletter' }}
        </h4>
        <p class="text-xs text-zinc-500 font-medium">Get the latest Laravel tips and community news.</p>
    </div>

    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="relative group">
        @csrf
        <div class="flex flex-col md:flex-row gap-3">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-zinc-600 group-focus-within:text-laravel-red transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>

                <input
                    type="email"
                    name="email"
                    required
                    placeholder="artisan@laravelnepal.com"
                    class="w-full bg-black/40 border border-white/5 rounded-xl py-4 pl-12 pr-4 text-sm text-white placeholder:text-zinc-700 focus:outline-none focus:border-laravel-red/50 focus:ring-1 focus:ring-laravel-red/20 transition-all"
                >
            </div>

            <button type="submit" class="button-outlined py-2! md:py-0! px-6! flex items-center justify-center gap-2">
                <span>Join</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>

        @if(session('subscribed'))
            <p class="left-0 text-[10px] font-bold text-green-500 uppercase tracking-widest animate-pulse mt-2">
                You're on the list!
            </p>
        @endif

        @if($errors->any())
            <p class="left-0 text-[10px] font-bold text-red-500 uppercase tracking-widest mt-2">
                {{ $errors->first() }}
            </p>
        @endif
    </form>
</div>
