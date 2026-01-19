<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use AchyutN\LaravelSEO\Models\SEO;
use App\Models\Author;
use App\Models\Package;
use App\Models\Page;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tip;
use App\Settings\SiteSettings;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Throwable;

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
        $compact = compact('model', 'logo');

        $view = match (true) {
            $model instanceof Page => view('components.open-graph.page-open-graph', $compact),
            $model instanceof Post => view('components.open-graph.post-open-graph', $compact),
            $model instanceof Tip => view('components.open-graph.tip-open-graph', $compact),
            $model instanceof Project => view('components.open-graph.project-open-graph', $compact),
            $model instanceof Package => view('components.open-graph.package-open-graph', $compact),
            $model instanceof Author => view('components.open-graph.author-open-graph', $compact),
            default => null,
        };

        try {
            $html = $view?->render();
        } catch (Throwable $throwable) {
            abort(500, 'Failed to render Open Graph image HTML: '.$throwable->getMessage());
        }

        $browserShot = Browsershot::html($html)
            ->windowSize(1200, 630)
            ->waitUntilNetworkIdle()
            ->emulateMedia('screen')
            ->format('png')
            ->quality(100)
            ->setDelay(2000)
            ->setNodeBinary(config('services.node.node_path'))
            ->setNpmBinary(config('services.node.npm_path'))
            ->fullPage()
            ->noSandbox()
            ->screenshot();

        $fileName = $model ? mb_strtolower(class_basename($model)).'-'.$model->getKey().'.png' : 'open-graph-image.png';

        return response($browserShot, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'inline; filename="'.$fileName.'"',
            'Cache-Control' => 'public, max-age=604800, immutable',
        ]);
    }
}
