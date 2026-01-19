<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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
    public function __invoke(Request $request, string $model, string $key)
    {
        $siteSettings = app(SiteSettings::class);
        $logo = '/storage/'.$siteSettings->logo;

        $modelObject = match ($model) {
            'page' => Page::class,
            'post' => Post::class,
            'tip' => Tip::class,
            'project' => Project::class,
            'package' => Package::class,
            'author' => Author::class,
            default => null,
        };

        $instance = $modelObject::findOrFail($key);

        $compact = [
            'model' => $instance,
            'logo' => $logo,
        ];

        $view = match ($model) {
            'page' => view('components.open-graph.page-open-graph', $compact),
            'post' => view('components.open-graph.post-open-graph', $compact),
            'tip' => view('components.open-graph.tip-open-graph', $compact),
            'project' => view('components.open-graph.project-open-graph', $compact),
            'package' => view('components.open-graph.package-open-graph', $compact),
            'author' => view('components.open-graph.author-open-graph', $compact),
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

        $fileName = $instance ? $model.'-'.$key.'.png' : 'open-graph-image.png';

        return response($browserShot, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'inline; filename="'.$fileName.'"',
            'Cache-Control' => 'public, max-age=604800, immutable',
        ]);
    }
}
