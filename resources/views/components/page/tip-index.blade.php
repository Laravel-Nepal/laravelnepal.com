<?php

use App\Enums\PageType;
use App\Models\Page;
use App\Models\Tip;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

new #[Layout('layouts::page')] class extends Component
{
    #[Url(as: 'q', except: '')]
    public string $query = '';

    /** @var array<int, string> */
    #[Url(as: 'tag', except: [])]
    public array $selectedTags = [];

    public array $breadCrumb = [];

    public function mount(): void
    {
        $page = Page::query()
            ->whereType(PageType::IndexPage)
            ->whereName('tips')
            ->first();

        views($page)->record();

        $this->breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Tips', 'url' => route('page.tips.index')],
        ];
    }

    /** @return Collection<int, Tip> */
    #[Computed]
    public function tips(): Collection
    {
        return Tip::query()
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
    }

    /** @return array<int, array{value: string, bracketValue: int}> */
    #[Computed]
    public function tags(): array
    {
        return Tip::query()
            ->select('tags')
            ->get()
            ->flatMap(
                /** @phpstan-return array<int, string> */
                fn (Tip $tip): array => (array) $tip->getAttribute('tags')
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
    }
};
?>

<div>
    <x-shared.back-to-landing-page />

    <article>
        <header class="mb-16 space-y-8">
            <x-shared.bread-crumb :$breadCrumb />
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-[0.9] tracking-tighter">Tips</h1>
            <hr class="border-white/5" />
        </header>

        <div x-data="{ sidebarOpen: false }">
            <div class="flex gap-4 mb-8">
                <livewire:shared::filter-input wire:model.live.debounce.500ms="query" label="tip" />
                <x-shared.filter-toggle />
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <aside
                    class="lg:col-span-3 space-y-8 lg:sticky lg:top-12 transition-all duration-300"
                    x-transition
                    :class="sidebarOpen ? 'block' : 'hidden lg:block'"
                >
                    <livewire:shared::checkbox-glass :array-values="$this->tags" wire:model.live="selectedTags" />
                </aside>

                <main class="lg:col-span-9">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @forelse($this->tips as $tip)
                            <x-shared.tip-component :$tip wire:key="tip-{{ $tip->getKey() }}" />
                        @empty
                            <x-shared.empty-state icon="lightbulb" label="tips" />
                        @endforelse
                    </div>
                </main>
            </div>
        </div>
    </article>
</div>

@push('seo')
    @php
        $page = \App\Models\Page::whereType(\App\Enums\PageType::IndexPage)->whereName('tips')->first();
    @endphp
    {!! seo($page) !!}
@endpush