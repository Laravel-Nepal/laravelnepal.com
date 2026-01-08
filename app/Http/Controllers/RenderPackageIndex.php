<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\PageType;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class RenderPackageIndex extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Packages', 'url' => route('page.package.index')],
        ];

        $page = Page::query()
            ->whereType(PageType::IndexPage)
            ->whereName('package')
            ->first();
        views($page)->record();

        return view('components.page.package-index', compact('breadCrumb', 'page'));
    }
}
