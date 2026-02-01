<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Contracts\Contentable;
use Illuminate\View\View;
use Livewire\Component;

final class Comments extends Component
{
    public Contentable $content;

    public function render(): View
    {
        return view('livewire.comments');
    }
}
