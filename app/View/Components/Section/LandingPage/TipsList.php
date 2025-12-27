<?php

declare(strict_types=1);

namespace App\View\Components\Section\LandingPage;

use App\Models\Tip;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class TipsList extends Component
{
    /** @var Collection<int, Tip> */
    public Collection $tips;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->tips = Tip::query()
            ->latest()
            ->take(6)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.section.landing-page.tips-list');
    }
}
