<?php

declare(strict_types=1);

namespace App\Livewire\Shared;

use App\Contracts\Contentable;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;

#[Lazy]
final class VoteGlass extends Component
{
    public Contentable $content;

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

    public function render(): View
    {
        return view('livewire.shared.vote-glass');
    }
}
