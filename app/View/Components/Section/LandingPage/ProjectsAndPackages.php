<?php

declare(strict_types=1);

namespace App\View\Components\Section\LandingPage;

use App\Models\Package;
use App\Models\Project;
use App\Models\Tip;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class ProjectsAndPackages extends Component
{
    /** @var Collection<int, Project> */
    public Collection $projects;

    /** @var Collection<int, Package> */
    public Collection $packages;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->projects = Project::query()
            ->latest()
            ->take(4)
            ->get();

        $this->packages = Package::query()
            ->latest()
            ->take(4)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.section.landing-page.projects-and-packages');
    }
}
