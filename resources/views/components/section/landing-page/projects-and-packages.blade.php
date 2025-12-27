<div class="container grid grid-cols-1 lg:grid-cols-2 gap-8 mt-18">
    <x-layouts.section
        title="Projects"
    >
        @foreach($projects as $project)
            <x-shared.project-component :$project />
        @endforeach
    </x-layouts.section>
</div>
