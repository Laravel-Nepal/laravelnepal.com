<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class RenderPostView extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Post $post): View
    {
        $breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Posts', 'url' => '#'],
            ['label' => $post->getAttribute('title'), 'url' => route('page.post.view', $post)],
        ];

        return view('components.page.post-view', compact('post', 'breadCrumb'));
    }
}
