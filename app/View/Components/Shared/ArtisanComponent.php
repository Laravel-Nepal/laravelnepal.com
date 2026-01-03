<?php

declare(strict_types=1);

namespace App\View\Components\Shared;

use App\Models\Author;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class ArtisanComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Author $author
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.shared.artisan-component');
    }
}
