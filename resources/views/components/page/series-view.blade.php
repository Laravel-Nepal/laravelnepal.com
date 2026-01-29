<x-layouts.front-layout :title="$series->title" :$breadCrumb>
    <x-slot:header>
        <div class="flex items-center gap-6">
            <x-shared.author-stat :author="$series->author" />

            <div class="h-8 w-px bg-white/5"></div>

            <x-shared.header-stat
                label="Total Content"
                :value="$series->post_count . ' ' . Str::plural('Article', $series->posts_count)"
            />
        </div>
    </x-slot:header>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-8">
        <div class="lg:col-span-8 space-y-8">
            <div class="glass p-8 md:p-12 rounded-[3.5rem] relative overflow-hidden">
                <div class="absolute -top-24 -left-24 w-64 h-64 bg-laravel-red/5 blur-[100px] pointer-events-none"></div>

                <div class="prose prose-invert max-w-none prose-p:text-zinc-400 prose-headings:text-white mb-12">
                    @markdown($series->description)
                </div>

                <hr class="border-white/5 mb-12">

                <div class="space-y-6">
                    <div class="relative space-y-4">
                        @foreach($series->post_list as $index => $post)
                            <x-shared.series-blog-component :$index :$series :$post />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <aside class="lg:col-span-4">
            <div class="sticky top-12 flex flex-col gap-4">
                <livewire:shared.vote-glass :content="$series" />
                <x-shared.tags-glass :tags="$series->tags" />
                <x-shared.share-glass />
                <x-shared.subscribe-glass />
            </div>
        </aside>
    </div>

    @push('seo')
        {!! seo($series) !!}
    @endpush
</x-layouts.front-layout>
