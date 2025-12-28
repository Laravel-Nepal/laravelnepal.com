<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
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

        $posts = Post::query()
            ->latest()
            ->take(0)
            ->get();

        $tags = Post::query()
            ->select('tags')
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->values();

        return view('components.page.post-index', compact('breadCrumb', 'posts', 'tags'));
    }
}
