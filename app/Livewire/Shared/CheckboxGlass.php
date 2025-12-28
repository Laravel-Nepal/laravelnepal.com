<?php

declare(strict_types=1);

namespace App\Livewire\Shared;

use Illuminate\View\View;
use Livewire\Attributes\Modelable;
use Livewire\Component;

final class CheckboxGlass extends Component
{
    /** @var array<int, string> */
    #[Modelable]
    public array $value = [];

    public ?string $label;

    /** @var array<int, array{value: string, bracketValue: int}> */
    public array $arrayValues = [];

    /**
     * @param  array<int, array{value: string, bracketValue: int}>  $arrayValues
     */
    public function mount(array $arrayValues, ?string $label = null): void
    {
        $this->label = $label ?? 'Tags';
        $this->arrayValues = $arrayValues;
    }

    public function render(): View
    {
        return view('livewire.shared.checkbox-glass');
    }
}
