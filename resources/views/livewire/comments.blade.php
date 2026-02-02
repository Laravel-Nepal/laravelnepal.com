<section class="mt-16 space-y-12">
    <div class="flex items-center justify-between border-b border-white/5 pb-6">
        <h2 class="text-3xl font-black flex items-center gap-3">
            Comments
            @if($content->total_comments > 0)
                <span class="text-xs font-mono text-laravel-red bg-laravel-red/10 border border-laravel-red/20 px-3 py-1 rounded-full">
                    {{ $content->total_comments }}
                </span>
            @endif
        </h2>
    </div>

    <div
        class="glass p-8 rounded-[2.5rem] relative overflow-hidden group border border-white/5 focus-within:border-laravel-red/30 transition-all duration-500"
    >
        <form wire:submit="addComment" class="relative z-10 space-y-5">
            <div class="grow">
                <label class="block text-[10px] font-mono text-zinc-500 uppercase tracking-widest mb-2 ml-1">
                    Display Name <span class="text-zinc-700 italic">(Optional)</span>
                </label>
                <input
                    type="text"
                    placeholder="Anonymous Artisan"
                    wire:model="name"
                    class="w-full bg-black/40 border border-white/5 rounded-2xl px-5 py-3 text-sm text-zinc-300 focus:outline-none focus:border-laravel-red/50 focus:ring-1 focus:ring-laravel-red/20 transition-all"
                >
                @error('name') <p class="text-[10px] font-bold text-laravel-red mt-2 ml-1 uppercase tracking-tight">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[10px] font-mono text-zinc-500 uppercase tracking-widest mb-2 ml-1">
                    Your Thought
                </label>
                <textarea
                    placeholder="Share your feedback or ask a question..."
                    wire:model="message"
                    class="w-full bg-black/40 border border-white/5 rounded-3xl px-5 py-4 text-sm text-zinc-300 focus:outline-none focus:border-laravel-red/50 focus:ring-1 focus:ring-laravel-red/20 transition-all min-h-32 resize-none"
                ></textarea>
                @error('message') <p class="text-[10px] font-bold text-laravel-red mt-2 ml-1 uppercase tracking-tight">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between pt-2">
                <div class="flex items-center gap-2">
                    <div class="w-1.5 h-1.5 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.4)]"></div>
                    <span class="text-[10px] font-mono text-zinc-500 uppercase tracking-tight">Markdown Enabled</span>
                </div>

                <button type="submit" wire:loading.attr="disabled" class="button-red small px-10 py-3 rounded-xl font-bold text-xs active:scale-95 disabled:opacity-50 transition-all">
                    <span wire:loading.remove wire:target="addComment">Post Comment</span>
                    <span wire:loading wire:target="addComment">Posting...</span>
                </button>
            </div>
        </form>
    </div>

    <div class="space-y-6">
        @forelse($content->comments as $comment)
            <div wire:key="comment-{{ $comment->id }}" class="glass p-8 rounded-[2.5rem] flex flex-col sm:flex-row gap-6 relative group transition-all duration-500 hover:border-white/10" wire:transition>

                <div class="flex flex-row sm:flex-col items-center gap-2">
                    <livewire:shared.upvote-content :content="$comment" :key="'vote-'.$comment->id" />
                </div>

                <div class="grow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-black {{ $comment->user_name ? 'text-white' : 'text-zinc-500 italic' }}">
                                Anonymous Artisan
                            </span>
                            <span class="text-[10px] text-zinc-600 font-bold uppercase tracking-tighter">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>

                    <div class="prose prose-invert max-w-none prose-p:text-zinc-100 prose-p:leading-relaxed">
                        @markdown($comment->content)
                    </div>
                </div>
            </div>
        @empty
            <div class="glass p-12 rounded-[2.5rem] border border-dashed border-white/5 text-center">
                <p class="text-zinc-500 italic text-sm">No comments yet. Be the first to share your thoughts!</p>
            </div>
        @endforelse
    </div>
</section>
