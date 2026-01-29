<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class RenderSeriesPostView extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Series $series, Post $post): View
    {
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Series', 'url' => route('page.series.index')],
            ['label' => $series->getTitleValue(), 'url' => $series->getURLValue()],
            ['label' => $post->getTitleValue(), 'url' => $post->getURLValue()],
        ];

        views($post)->record();

        return view('components.page.post-view', compact('series', 'post', 'breadCrumb'));
    }
}
