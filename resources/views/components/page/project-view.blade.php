<?php

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::page')] class extends Component
{
    public Project $project;

    public array $breadCrumb = [];

    public function mount(Project $project): void
    {
        $this->project = $project;

        views($project)->record();

        $this->breadCrumb = [
            ['label' => 'Home', 'url' => route('page.landingPage')],
            ['label' => 'Projects', 'url' => route('page.project.index')],
            ['label' => $project->getAttribute('title'), 'url' => route('page.project.view', $project)],
        ];
    }
};
?>

<div>
    <x-shared.back-to-landing-page />

    <article>
        <header class="mb-16 space-y-8">
            <x-shared.bread-crumb :$breadCrumb />
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-[0.9] tracking-tighter">{{ $project->title }}</h1>
            <hr class="border-white/5" />

            <div class="flex items-center gap-6">
                <x-shared.author-stat :author="$project->author" />

                <div class="h-8 w-px bg-white/5"></div>

                <x-shared.header-stat
                    label="Project URL"
                    :link="$project->website"
                    :value="str_replace(['https://', 'http://'], '', $project->website)"
                />

                <div class="h-8 w-px bg-white/5"></div>

                <x-shared.header-stat
                    label="Source Code"
                    :link="$project->github_url"
                    :value="$project->github"
                />
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-4">
            <div class="lg:col-span-8">
                <div class="glass p-8 md:p-12 rounded-[3rem] relative overflow-hidden">
                    <div class="absolute -top-24 -left-24 w-64 h-64 bg-laravel-red/5 blur-[100px] pointer-events-none"></div>

                    <div class="prose prose-invert max-w-none prose-a:text-laravel-red prose-a:font-bold">
                        @markdown($project->content)
                    </div>
                </div>
                <livewire:shared::comments :content="$project" />
            </div>
            <aside class="lg:col-span-4 space-y-8">
                <div class="sticky top-12 flex flex-col gap-4">
                    <livewire:shared::vote-glass :content="$project" />
                    <x-shared.tags-glass :tags="$project->tags" />
                    <x-shared.share-glass />
                    <x-shared.subscribe-glass />
                </div>
            </aside>
        </div>
    </article>
</div>

@push('seo')
    {!! seo($project) !!}
@endpush