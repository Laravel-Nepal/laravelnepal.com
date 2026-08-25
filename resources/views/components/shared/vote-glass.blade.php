<?php

use App\Contracts\Votable;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;

new #[Lazy] class extends Component
{
    public Votable $content;

    #[On('vote-added')]
    public function addVote(): void
    {
        $this->content->vote();
    }

    #[On('vote-removed')]
    public function reduceVote(): void
    {
        $this->content->removeVote();
    }
};
?>

@placeholder
    <div class="glass p-8 rounded-4xl animate-pulse">
        <div class="h-12 bg-white/10 rounded"></div>
    </div>
@endplaceholder

<div class="glass p-8 rounded-4xl flex items-center justify-between">
    <livewire:shared.vote-content
        :count="$content->getTotalVotes()"
        :active="$content->contentIsVoted()"
    />
    <div class="text-end">
        <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-neutral-400">
            Appreciate
        </h4>
        <p class="text-xs text-zinc-500 font-medium">
            Show some support to this {{ class_basename($content) }}
        </p>
    </div>
</div>
