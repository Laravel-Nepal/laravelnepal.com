<?php

declare(strict_types=1);

namespace App\Livewire\Shared;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Modelable;
use Livewire\Component;

final class FilterInput extends Component
{
    #[Modelable]
    public string $value = '';

    public string $label = '';

    public function mount(string $label): void
    {
        $this->label = $label;
    }

    public function render(): Factory|View
    {
        return view('livewire.shared.filter-input');
    }
}
