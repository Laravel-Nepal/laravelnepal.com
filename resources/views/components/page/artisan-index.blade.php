<?php

use App\Enums\PageType;
use App\Models\Author;
use App\Models\Page;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

new #[Layout('layouts::page')] class extends Component
{
    #[Url(as: 'q', except: '')]
    public string $query = '';

    public array $breadCrumb = [];

    public function mount(): void
    {
        $page = Page::query()
            ->whereType(PageType::IndexPage)
            ->whereName('artisan')
            ->first();

        views($page)->record();

        $this->breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Artisans', 'url' => route('page.artisan.index')],
        ];
    }

    /** @return Collection<int, Author> */
    #[Computed]
    public function artisans(): Collection
    {
        return Author::with('posts', 'tips', 'projects', 'packages')
            ->withCount(['posts', 'tips', 'projects', 'packages'])
            ->orderByRaw('(posts_count + tips_count + projects_count + packages_count) DESC')
            ->orderBy('name', 'ASC')
            ->when(filled($this->query), function ($query): void {
                $query->where('name', 'like', '%'.$this->query.'%');
            })
            ->get();
    }
};
?>

<div>
    <x-shared.back-to-landing-page />

    <article>
        <header class="mb-16 space-y-8">
            <x-shared.bread-crumb :$breadCrumb />
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-[0.9] tracking-tighter">Artisans</h1>
            <hr class="border-white/5" />
        </header>

        <div x-data="{ sidebarOpen: false }">
            <div class="flex gap-4 mb-8">
                <livewire:shared::filter-input wire:model.live.debounce.500ms="query" label="artisan" />
                <x-shared.filter-toggle />
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <main class="lg:col-span-12">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @forelse($this->artisans as $author)
                            <x-shared.artisan-component :$author wire:key="artisan-{{ $author->getKey() }}" />
                        @empty
                            <x-shared.empty-state icon="bars-staggered" label="artisans" />
                        @endforelse
                    </div>
                </main>
            </div>
        </div>
    </article>
</div>

@push('seo')
    @php
        $page = \App\Models\Page::whereType(\App\Enums\PageType::IndexPage)->whereName('artisan')->first();
    @endphp
    {!! seo($page) !!}
@endpush