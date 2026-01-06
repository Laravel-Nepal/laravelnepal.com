<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\PageType;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class RenderTipIndex extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Tips', 'url' => route('page.tips.index')],
        ];

        $page = Page::query()
            ->whereType(PageType::IndexPage)
            ->whereName('tips')
            ->first();

        return view('components.page.tip-index', compact('breadCrumb', 'page'));
    }
}
