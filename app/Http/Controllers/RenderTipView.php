<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class RenderTipView extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Tip $tip): View
    {
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Tips', 'url' => route('page.tips.index')],
            ['label' => $tip->getAttribute('title'), 'url' => route('page.tips.view', $tip)],
        ];

        views($tip)->record();

        return view('components.page.tip-view', compact('tip', 'breadCrumb'));
    }
}
