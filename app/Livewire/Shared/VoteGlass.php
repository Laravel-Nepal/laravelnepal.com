<?php

declare(strict_types=1);

namespace App\Livewire\Shared;

use App\Contracts\Contentable;
use Illuminate\View\View;
use Livewire\Component;

final class VoteGlass extends Component
{
    public Contentable $content;
    public int $count = 0;

    public function mount(): void
    {
        $this->count = $this->content->getTotalVotes();
    }

    public function render(): View
    {
        return view('livewire.shared.vote-glass');
    }
}
