<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\PageType;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class RenderProjectIndex extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Projects', 'url' => route('page.project.index')],
        ];

        $page = Page::query()
            ->whereType(PageType::IndexPage)
            ->whereName('project')
            ->first();

        return view('components.page.project-index', compact('breadCrumb', 'page'));
    }
}
