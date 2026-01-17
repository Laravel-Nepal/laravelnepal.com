<div class="glass p-8 rounded-4xl flex items-center justify-between">
    <livewire:shared.vote-content
        :count="$content->getTotalVotes()"
        :active="$content->contentIsVoted()"
    />
    <div class="text-end">
        <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-neutral-400">
            Appreciate this
        </h4>
        <p class="text-xs text-zinc-500 font-medium">Was this helpful?</p>
    </div>
</div>
