<?php

declare(strict_types=1);

namespace App\View\Components\Shared;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class TagsGlass extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  array<int, string>  $tags
     */
    public function __construct(
        public string $title = 'Tags',
        public array $tags = [],
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.shared.tags-glass');
    }
}
