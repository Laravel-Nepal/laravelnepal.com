<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\Factory;

final class PostsAndNews extends Component
{
    /** @var Collection<int, Post> */
    public Collection $posts;

    /** @var Collection<int, Post> */
    public Collection $news;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->posts = Post::query()
            ->wherejsonDoesntContain('tags', 'news')
            ->latest()
            ->take(4)
            ->get();

        $this->news = Post::query()
//            ->whereJsonContains('tags', 'news')
            ->latest()
            ->take(5)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Factory
    {
        return view('components.posts-and-news');
    }
}
