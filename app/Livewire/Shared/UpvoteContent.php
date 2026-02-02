<?php

declare(strict_types=1);

namespace App\Livewire\Shared;

use App\Contracts\Votable;
use Illuminate\View\View;
use Livewire\Component;

final class UpvoteContent extends Component
{
    public Votable $content;

    public bool $contentIsVoted = false;

    public int $totalVotes = 0;

    public function mount(): void
    {
        $this->contentIsVoted = $this->content->contentIsVoted();
        $this->totalVotes = $this->content->getTotalVotes();
    }

    public function toggleVote(): void
    {
        if ($this->contentIsVoted) {
            $this->content->removeVote();
            $this->totalVotes--;
        } else {
            $this->content->vote();
            $this->totalVotes++;
        }

        $this->contentIsVoted = ! $this->contentIsVoted;
    }

    public function render(): View
    {
        return view('livewire.shared.upvote-content');
    }
}
