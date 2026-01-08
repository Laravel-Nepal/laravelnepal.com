<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\PageType;
use App\Models\Page;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class RenderPostIndex extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Factory|View
    {
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Posts', 'url' => route('page.post.index')],
        ];

        $page = Page::query()
            ->whereType(PageType::IndexPage)
            ->whereName('post')
            ->first();
        views($page)->record();

        return view('components.page.post-index', compact('breadCrumb', 'page'));
    }
}
