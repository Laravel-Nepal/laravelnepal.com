<?php

namespace App\Http\Controllers;

use AchyutN\LaravelSEO\Models\SEO;
use App\Settings\SiteSettings;
use Illuminate\Http\Request;

class RenderOpenGraphImage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, SEO $seo)
    {
        $siteSettings = app(SiteSettings::class);
//        $post = $seo->model;
        $tip = $seo->model;
        $logo = '/storage/'.$siteSettings->logo;

        return view('components.open-graph.tip-open-graph', compact('tip', 'logo'));
    }
}
