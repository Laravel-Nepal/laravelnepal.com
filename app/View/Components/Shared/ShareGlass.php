<?php

declare(strict_types=1);

namespace App\View\Components\Shared;

use Dipesh79\LaravelShare\LaravelShare;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class ShareGlass extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $title,
        public LaravelShare $share,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.shared.share-glass');
    }
}
