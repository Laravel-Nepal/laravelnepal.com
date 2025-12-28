<?php

declare(strict_types=1);

namespace App\Livewire\Shared;

use Illuminate\View\View;
use Livewire\Attributes\Modelable;
use Livewire\Component;

final class CheckboxGlass extends Component
{
    #[Modelable]
    /** @var array<int, string> */
    public array $value = [];

    public string $label = 'Tags';

    /** @var array<int, array{value: string, bracketValue: int}> */
    public array $arrayValues = [];

    /**
     * @param  array<int, array{value: string, bracketValue: int}>  $arrayValues
     */
    public function mount(string $label, array $arrayValues): void
    {
        $this->label = $label;
        $this->arrayValues = $arrayValues;
    }

    public function render(): View
    {
        return view('livewire.shared.checkbox-glass');
    }
}
