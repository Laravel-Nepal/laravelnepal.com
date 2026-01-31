<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Series;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

final class FilterSeries extends Component
{
    /** @var Collection<int, Series> */
    public Collection $series;

    /** @var array<int, array{value: string, bracketValue: int}> */
    public array $tags;

    #[Url(as: 'q', except: '')]
    public string $query = '';

    /** @var array<int, string> */
    #[Url(as: 'tag', except: [])]
    public array $selectedTags = [];

    public function render(): View
    {
        $this->series = Series::query()
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

        $this->tags = Series::query()
            ->select('tags')
            ->get()
            ->flatMap(
                /** @phpstan-return array<int, string> */
                fn (Series $series): array => (array) $series->getAttribute('tags')
            )
            ->countBy()
            ->map(
                fn (int $count, string $tag): array => [
                    'value' => $tag,
                    'bracketValue' => $count,
                ]
            )
            ->values()
            ->all();

        return view('livewire.filter-series');
    }
}
