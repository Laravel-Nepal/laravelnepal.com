<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

final class RenderSeriesView extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Series $series)
    {
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Series', 'url' => route('page.series.index')],
            ['label' => $series->getAttribute('title'), 'url' => route('page.series.view', $series)],
        ];

        views($series)->record();

        return view('components.page.series-view', compact('series', 'breadCrumb'));
    }
}
