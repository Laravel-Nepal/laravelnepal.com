<?php

declare(strict_types=1);

namespace App\View\Components\Shared;

use App\Models\Series;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class SeriesComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Series $series
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.shared.series-component');
    }
}
