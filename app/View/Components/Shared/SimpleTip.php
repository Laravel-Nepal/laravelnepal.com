<?php

declare(strict_types=1);

namespace App\View\Components\Shared;

use App\Models\Tip;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class SimpleTip extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Tip $tip,
        public ?string $class
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.shared.simple-tip');
    }
}
