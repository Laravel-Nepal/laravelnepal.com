<div x-data="{ sidebarOpen: false }">
    <div class="flex gap-4 mb-8">
        <livewire:shared.filter-input wire:model.live.debounce.500ms="query" label="package" />
        <x-shared.filter-toggle />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        <aside
            class="lg:col-span-3 space-y-8 lg:sticky lg:top-12 transition-all duration-300"
            x-transition
            :class="sidebarOpen ? 'block' : 'hidden lg:block'"
        >
            <livewire:shared.checkbox-glass :array-values="$tags" wire:model.live="selectedTags" />
        </aside>

        <main class="lg:col-span-9">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($packages as $package)
                    <x-shared.package-component :$package wire:key="package-{{ $package->getKey() }}" />
                @empty
                    <x-shared.empty-state icon="bars-staggered" label="packages" />
                @endforelse
            </div>
        </main>
    </div>
</div>
