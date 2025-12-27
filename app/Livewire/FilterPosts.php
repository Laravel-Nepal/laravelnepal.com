<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

final class FilterPosts extends Component
{
    /** @var Collection<int, Post> */
    public Collection $posts;

    /** @var Collection<int, string> */
    public Collection $tags;

    #[Url(as: 'q', except: '')]
    public string $query = '';

    public function render(): View
    {
        $this->posts = Post::query()
            ->when($this->query !== '', function ($query) {
                $query->where('title', 'like', '%'.$this->query.'%');
            })
            ->latest()
            ->get();

        $this->tags = Post::query()
            ->select('tags')
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->values();

        return view('livewire.filter-posts');
    }
}
