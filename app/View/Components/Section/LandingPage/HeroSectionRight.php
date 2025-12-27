<?php

declare(strict_types=1);

namespace App\View\Components\Section\LandingPage;

use App\Models\Post;
use App\Models\Tip;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class HeroSectionRight extends Component
{
    public Post $post;
    public Tip $tip;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->post = Post::query()
            ->latest()
            ->first();

        $this->tip = Tip::query()
            ->latest()
            ->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.section.landing-page.hero-section-right');
    }
}
