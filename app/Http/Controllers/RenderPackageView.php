<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RenderPackageView extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Package $package): View
    {
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Packages', 'url' => '#'],
            ['label' => $package->name, 'url' => route('page.package.view', $package)],
        ];

        return view('components.page.package-view', compact('package', 'breadCrumb'));
    }
}
