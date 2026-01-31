<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\PageType;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class RenderSeriesIndex extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Series', 'url' => route('page.series.index')],
        ];

        $page = Page::query()
            ->whereType(PageType::IndexPage)
            ->whereName('series')
            ->first();
        views($page)->record();

        return view('components.page.series-index', compact('breadCrumb', 'page'));
    }
}
