<?php

declare(strict_types=1);

namespace App\View\Components\Shared;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class SimpleBlog extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Post $post
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.shared.simple-blog');
    }
}
