<?php

declare(strict_types=1);

namespace App\Livewire\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Livewire\Component;

final class VoteGlass extends Component
{
    public $content;
    public int $count = 0;

    public function render(): View
    {
        return view('livewire.shared.vote-glass');
    }
}
