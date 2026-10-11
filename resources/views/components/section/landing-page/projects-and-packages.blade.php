<?php

use App\Models\Package;
use App\Models\Project;
use Illuminate\Support\Collection;
use Livewire\Component;

new class extends Component
{
    /** @var Collection<int, Project> */
    public Collection $projects;

    /** @var Collection<int, Package> */
    public Collection $packages;

    public function mount(): void
    {
        $this->projects = Project::query()
            ->latest()
            ->take(4)
            ->get();

        $this->packages = Package::query()
            ->latest()
            ->take(4)
            ->get();
    }
};
?>

<div class="container grid grid-cols-1 lg:grid-cols-2 gap-8 mt-18 items-start">
    <x-layouts.section
        title="Projects"
    >
        @foreach($projects as $project)
            <x-shared.project-component :$project />
        @endforeach
    </x-layouts.section>
    <x-layouts.section
        title="Packages"
    >
        @foreach($packages as $package)
            <x-shared.package-component :$package />
        @endforeach
    </x-layouts.section>
</div>