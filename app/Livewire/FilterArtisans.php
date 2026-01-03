<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Author;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

final class FilterArtisans extends Component
{
    /** @var Collection<int, Author> */
    public Collection $artisans;

    #[Url(as: 'q', except: '')]
    public string $query = '';

    public function render(): View
    {
        $this->artisans = Author::with('posts', 'tips', 'projects', 'packages')
            ->withCount(['posts', 'tips', 'projects', 'packages'])
            ->orderByRaw('(posts_count + tips_count + projects_count + packages_count) DESC')
            ->orderBy('name', 'ASC')
            ->when(filled($this->query), function ($query): void {
                $query->where('name', 'like', '%'.$this->query.'%');
            })
            ->get();

        return view('livewire.filter-artisans');
    }
}
