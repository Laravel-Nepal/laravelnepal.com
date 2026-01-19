<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use AchyutN\LaravelSEO\Models\SEO;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tip;
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
            $model instanceof Post => 'components.open-graph.post-open-graph',
            $model instanceof Tip => 'components.open-graph.tip-open-graph',
            $model instanceof Project => 'components.open-graph.project-open-graph',
            default => null,
        };

        return view($view, compact('model', 'logo'));
    }
}
