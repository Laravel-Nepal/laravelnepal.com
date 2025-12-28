<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Package;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

final class FilterPackages extends Component
{
    /** @var Collection<int, Package> */
    public Collection $packages;

    /** @var array<int, array{value: string, bracketValue: int}> */
    public array $tags;

    #[Url(as: 'q', except: '')]
    public string $query = '';

    /** @var array<int, string> */
    #[Url(as: 'tag', except: [])]
    public array $selectedTags = [];

    public function render(): View
    {
        $this->packages = Package::query()
            ->when(filled($this->query), function ($query): void {
                $query->where('name', 'like', '%'.$this->query.'%');
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

        $this->tags = Package::query()
            ->select('tags')
            ->get()
            ->flatMap(
                /** @phpstan-return array<int, string> */
                fn (Package $package): array => (array) $package->getAttribute('tags')
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

        return view('livewire.filter-packages');
    }
}
