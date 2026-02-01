<section class="mt-16 space-y-12">
    <div class="flex items-center justify-between border-b border-white/5 pb-6">
        <h2 class="text-3xl font-black flex items-center gap-3">
            Comments
            @if($content->total_comments > 0)
                <span class="text-sm font-mono text-zinc-500 bg-white/5 px-3 py-1 rounded-full">
                    {{ $content->total_comments }}
                </span>
            @endif
        </h2>
    </div>

    <div class="glass p-8 rounded-[2.5rem] relative overflow-hidden group border border-white/5 focus-within:border-laravel-red/30 transition-all duration-500">
        <div class="absolute -top-12 -right-12 w-32 h-32 bg-laravel-red/5 blur-[60px] pointer-events-none"></div>

        <form class="relative z-10 space-y-5" wire:submit.prevent="addComment">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="grow">
                    <label class="block text-[10px] font-mono text-zinc-500 uppercase tracking-widest mb-2 ml-1">
                        Display Name <span class="text-zinc-700 italic">(Optional)</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Anonymous Artisan"
                        wire:model.debounce.500ms="name"
                        class="w-full bg-black/40 border border-white/5 rounded-2xl px-5 py-3 text-sm text-zinc-300 focus:outline-none focus:border-laravel-red/50 focus:ring-1 focus:ring-laravel-red/20 transition-all"
                    >
                    @error('name')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-mono text-zinc-500 uppercase tracking-widest mb-2 ml-1">
                    Your Thought
                </label>
                <textarea
                    placeholder="Share your feedback or ask a question..."
                    wire:model.debounce.500ms="message"
                    class="w-full bg-black/40 border border-white/5 rounded-3xl px-5 py-4 text-sm text-zinc-300 focus:outline-none focus:border-laravel-red/50 focus:ring-1 focus:ring-laravel-red/20 transition-all min-h-30 resize-none"
                ></textarea>
                @error('message')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between pt-2">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-green-500 shadow-[0_0_10px_oklch(72.3%_0.219_149.579)]"></div>
                    <span class="text-[10px] font-mono text-zinc-500 uppercase tracking-tight">Markdown Enabled</span>
                </div>

                <button
                    type="submit"
                    @class([
                        "button-red small px-10 py-3 rounded-xl font-bold text-xs transition-transform active:scale-95",
                    ])
                >
                    Post Comment
                </button>
            </div>
        </form>
    </div>

    <div class="space-y-6">
        @forelse($content->comments as $comment)
            <div class="glass p-8 rounded-[2.5rem] flex gap-6 relative group" wire:transition>
                <div class="flex flex-col items-center gap-2">
                    <button class="w-12 h-12 rounded-2xl border border-white/5 bg-white/2 flex flex-col items-center justify-center group/vote hover:border-laravel-red/50 hover:bg-laravel-red/5 transition-all">
                        <svg class="w-4 h-4 text-zinc-500 group-hover/vote:text-laravel-red transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.781 2.375c-.381-.475-1.181-.475-1.562 0l-8 10A1.001 1.001 0 0 0 4 14h4v7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7h4a1.001 1.001 0 0 0 .781-1.625l-8-10z"/>
                        </svg>
                        <span class="text-[10px] font-black text-zinc-400 group-hover/vote:text-white transition-colors">
                            0
                        </span>
                    </button>
                </div>

                <div class="grow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-black text-white">
                                Achyut Neupane
                            </span>
                            <span class="text-[10px] text-zinc-600 font-bold uppercase tracking-tighter">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>

                    <div class="prose prose-invert max-w-none prose-a:text-laravel-red prose-a:font-bold">
                        @markdown($comment->content)
                    </div>
                </div>
            </div>
        @empty
            <p class="glass p-8 rounded-[2.5rem] gap-6 relative text-center text-zinc-500 italic">No comments yet. Be the first to share your thoughts!</p>
        @endforelse
    </div>
</section>
