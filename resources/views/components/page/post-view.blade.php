<x-layouts.front-layout :title="$post->title" :$breadCrumb>
    <x-slot:header>
        <div class="flex items-center gap-6">
            <x-shared.author-stat :author="$post->author" />

            <div class="h-8 w-px bg-white/5"></div>

            <x-shared.header-stat label="Published" :value="$post->date->format('M d, Y')" />

            <div class="h-8 w-px bg-white/5"></div>

            <x-shared.header-stat label="Estimated" :value="$post->minutes_read_text" />
        </div>
    </x-slot:header>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-4">
        <div class="lg:col-span-8">
            <div class="glass p-8 md:p-12 rounded-[3rem] relative overflow-hidden">
                <div class="absolute -top-24 -left-24 w-64 h-64 bg-laravel-red/5 blur-[100px] pointer-events-none"></div>

                <div class="prose prose-invert max-w-none prose-a:text-laravel-red prose-a:font-bold">
                    @markdown($post->content)
                </div>
            </div>

            @if ($series)
                @php
                    $previous = $series->previous($post);
                    $next = $series->next($post);
                @endphp
                <div class="flex flex-row justify-between items-center gap-4 mt-4">
                    <div
                        @class([
                            "flex flex-col justify-start gap-2 items-start" => $previous,
                        ])
                    >
                        @if ($previous)
                            <div class="text-zinc-500 text-xs mb-1 ml-3 uppercase font-bold">Previous</div>
                            <x-shared.series-blog-component :$series :post="$previous" />
                        @endif
                    </div>
                    <div
                        @class([
                            "flex flex-col justify-start gap-2 items-end" => $next
                        ])
                    >
                        @if ($next)
                            <div class="text-zinc-500 text-xs mb-1 mr-3 uppercase font-bold">Next</div>
                            <x-shared.series-blog-component :$series :post="$next" />
                        @endif
                    </div>
                </div>
            @endif
        </div>
        <aside class="lg:col-span-4 space-y-8">
            <div class="sticky top-12 flex flex-col gap-4">
                <livewire:shared.vote-glass :content="$post" />
                <x-shared.tags-glass :tags="$post->tags" />
                <x-shared.share-glass />
                <x-shared.subscribe-glass />
            </div>
        </aside>
    </div>

    @push('seo')
        {!! seo($post) !!}
    @endpush
</x-layouts.front-layout>

