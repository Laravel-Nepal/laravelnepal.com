<?php

declare(strict_types=1);

namespace App\View\Components\Shared;

use App\Models\Package;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class PackageComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Package $package
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.shared.package-component');
    }
}
