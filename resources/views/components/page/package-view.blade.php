<x-layouts.front-layout :title="$package->name" :$breadCrumb>
    <x-slot:header>
        <div class="flex items-center gap-6">
            <x-shared.author-stat :author="$package->author" />

            <div class="h-8 w-px bg-white/5"></div>

            <x-shared.header-stat
                label="Registry"
                :value="$package->packagist"
                :link="$package->packagist_url"
            />

            <div class="h-8 w-px bg-white/5"></div>

            <x-shared.header-stat
                label="Source"
                :value="$package->github"
                :link="$package->github_url"
            />
        </div>
    </x-slot:header>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-4">
        <div class="lg:col-span-8">
            <div class="glass p-8 md:p-12 rounded-[3rem] relative overflow-hidden">
                <div class="absolute -top-24 -left-24 w-64 h-64 bg-laravel-red/5 blur-[100px] pointer-events-none"></div>

                <div class="prose prose-invert max-w-none prose-a:text-laravel-red prose-a:font-bold">
                    @markdown($package->content)
                </div>
            </div>
            <livewire:comments :content="$package" />
        </div>
        <aside class="lg:col-span-4 space-y-8">
            <div class="sticky top-12 flex flex-col gap-4">
                <livewire:shared.vote-glass :content="$package" />
                <x-shared.tags-glass :tags="$package->tags" />
                <x-shared.share-glass />
                <x-shared.subscribe-glass />
            </div>
        </aside>
    </div>
    @push('seo')
        {!! seo($package) !!}
    @endpush
</x-layouts.front-layout>
