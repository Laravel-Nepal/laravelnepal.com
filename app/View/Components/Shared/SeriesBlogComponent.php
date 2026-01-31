<?php

declare(strict_types=1);

namespace App\View\Components\Shared;

use App\Models\Post;
use App\Models\Series;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class SeriesBlogComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Series $series,
        public Post $post,
        public ?int $index = null,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.shared.series-blog-component');
    }
}
