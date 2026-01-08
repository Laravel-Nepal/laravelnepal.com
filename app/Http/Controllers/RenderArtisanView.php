<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class RenderArtisanView extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Author $author): View
    {
        $author->load(['posts', 'tips', 'projects', 'packages'])->loadCount(['posts', 'tips', 'projects', 'packages']);
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Artisans', 'url' => route('page.artisan.index')],
            ['label' => $author->getAttribute('name'), 'url' => route('page.artisan.view', $author)],
        ];

        views($author)->record();

        return view('components.page.artisan-view', compact('author', 'breadCrumb'));
    }
}
