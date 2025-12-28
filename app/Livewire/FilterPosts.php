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

    /** @var array<int, array{value: string, bracketValue: int}> */
    public array $tags;

    #[Url(as: 'q', except: '')]
    public string $query = '';

    /** @var array<int, string> */
    #[Url(as: 'tag', except: [])]
    public array $selectedTags = [];

    public function render(): View
    {
        $this->posts = Post::query()
            ->when(filled($this->query), function ($query): void {
                $query->where('title', 'like', '%'.$this->query.'%');
            })
            ->when($this->selectedTags !== [], function ($query): void {
                $query->where(function ($query): void {
                    foreach ($this->selectedTags as $selectedTag) {
                        $query->orWhereJsonContains('tags', $selectedTag);
                    }
                });
            })
            ->latest()
            ->get();

        $this->tags = Post::query()
            ->select('tags')
            ->get()
            ->flatMap(function ($post) {
                return $post->tags;
            })
            ->groupBy(fn ($tag): mixed => $tag)
            ->map(fn ($tags, $tag): array => [
                'value' => $tag,
                'bracketValue' => count($tags),
            ])
            ->values()
            ->all();

        return view('livewire.filter-posts');
    }
}
