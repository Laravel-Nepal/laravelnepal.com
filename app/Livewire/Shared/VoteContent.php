<?php

declare(strict_types=1);

namespace App\Livewire\Shared;

use Illuminate\View\View;
use Livewire\Component;

final class VoteContent extends Component
{
    public int $count = 0;

    public bool $active = false;

    public function toggleVote(): void
    {
        if ($this->active) {
            $this->count = max(0, $this->count - 1);
            $this->active = false;

            $this->dispatch('vote-removed')
                ->to(VoteGlass::class);
        } else {
            $this->count++;
            $this->active = true;

            $this->dispatch('vote-added')
                ->to(VoteGlass::class);
        }
    }

    public function render(): View
    {
        return view('livewire.shared.vote-content');
    }
}
