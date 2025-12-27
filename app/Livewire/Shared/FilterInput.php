<?php

declare(strict_types=1);

namespace App\Livewire\Shared;

use Livewire\Attributes\Modelable;
use Livewire\Component;

final class FilterInput extends Component
{
    #[Modelable]
    public string $value = '';

    public string $label = '';

    public function mount($label): void
    {
        $this->label = $label;
    }

    public function render()
    {
        return view('livewire.shared.filter-input');
    }
}
