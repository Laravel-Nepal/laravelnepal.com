<div x-data="{ sidebarOpen: false }">
    <div class="flex gap-4 mb-8">
        <livewire:shared.filter-input wire:model.live.debounce.500ms="query" label="artisan" />
        <x-shared.filter-toggle />
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        <main class="lg:col-span-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($artisans as $author)
                    <x-shared.artisan-component :$author wire:key="artisan-{{ $author->getKey() }}" />
                @empty
                    <x-shared.empty-state icon="bars-staggered" label="artisans" />
                @endforelse
            </div>
        </main>
    </div>
</div>
