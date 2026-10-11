<?php

use App\Models\Tip;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::page')] class extends Component
{
    public Tip $tip;

    public array $breadCrumb = [];

    public function mount(Tip $tip): void
    {
        $this->tip = $tip;

        views($tip)->record();

        $this->breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Tips', 'url' => route('page.tips.index')],
            ['label' => $tip->getAttribute('title'), 'url' => route('page.tips.view', $tip)],
        ];
    }
};
?>

<div>
    <x-shared.back-to-landing-page />

    <article>
        <header class="mb-16 space-y-8">
            <x-shared.bread-crumb :$breadCrumb />
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-[0.9] tracking-tighter">{{ $tip->title }}</h1>
            <hr class="border-white/5" />

            <div class="flex items-center gap-6">
                <x-shared.author-stat :author="$tip->author" />

                <div class="h-8 w-px bg-white/5"></div>

                <x-shared.header-stat label="Published" :value="$tip->date->format('M d, Y')" />

                <div class="h-8 w-px bg-white/5"></div>

                <x-shared.header-stat label="Estimated" :value="$tip->minutes_read_text" />
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-4">
            <div class="lg:col-span-8">
                <div class="glass p-8 md:p-12 rounded-[3rem] relative overflow-hidden">
                    <div class="absolute -top-24 -left-24 w-64 h-64 bg-laravel-red/5 blur-[100px] pointer-events-none"></div>

                    <div class="prose prose-invert max-w-none prose-a:text-laravel-red prose-a:font-bold">
                        @markdown($tip->content)
                    </div>
                </div>
                <livewire:shared::comments :content="$tip" />
            </div>
            <aside class="lg:col-span-4 space-y-8">
                <div class="sticky top-12 flex flex-col gap-4">
                    <livewire:shared::vote-glass :content="$tip" />
                    <x-shared.tags-glass :tags="$tip->tags" />
                    <x-shared.share-glass />
                    <x-shared.subscribe-glass />
                </div>
            </aside>
        </div>
    </article>
</div>

@push('seo')
    {!! seo($tip) !!}
@endpush