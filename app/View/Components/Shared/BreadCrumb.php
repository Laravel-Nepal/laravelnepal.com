<?php

declare(strict_types=1);

namespace App\View\Components\Shared;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class BreadCrumb extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  array<int, array<string, string|null>>  $breadCrumb
     */
    public function __construct(
        public array $breadCrumb,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.shared.bread-crumb');
    }
}
