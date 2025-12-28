<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

final class FilterProjects extends Component
{
    /** @var Collection<int, Project> */
    public Collection $projects;

    /** @var array<int, array{value: string, bracketValue: int}> */
    public array $tags;

    #[Url(as: 'q', except: '')]
    public string $query = '';

    /** @var array<int, string> */
    #[Url(as: 'tag', except: [])]
    public array $selectedTags = [];

    public function render(): View
    {
        $this->projects = Project::query()
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

        $this->tags = Project::query()
            ->select('tags')
            ->get()
            ->flatMap(
                /** @phpstan-return array<int, string> */
                fn (Project $project): array => (array) $project->getAttribute('tags')
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

        return view('livewire.filter-projects');
    }
}
