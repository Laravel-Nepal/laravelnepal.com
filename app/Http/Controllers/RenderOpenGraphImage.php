<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use AchyutN\LaravelSEO\Models\SEO;
use App\Settings\SiteSettings;
use Illuminate\Http\Request;

final class RenderOpenGraphImage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, SEO $seo)
    {
        $siteSettings = app(SiteSettings::class);
        $logo = '/storage/'.$siteSettings->logo;

        $model = $seo->model;
        $view = match (true) {
            $model instanceof \App\Models\Post => 'components.open-graph.post-open-graph',
            $model instanceof \App\Models\Tip => 'components.open-graph.tip-open-graph',
            default => null,
        };

        return view($view, compact('model', 'logo'));
    }
}
