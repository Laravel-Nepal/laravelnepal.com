<div class="grid grid-cols-5 gap-12 container">
    <div class="col-span-3">
        <x-layouts.section
            title="Blogs"
            link-url="#"
            link-label="View All"
            class="container"
        >
            <x-shared.featured-blog />
        </x-layouts.section>
    </div>
    <div class="col-span-2">
        <x-layouts.section
            title="News"
            link-url="#"
            link-label="View All"
            class="container"
        >
            These are my news
        </x-layouts.section>
    </div>
    <div class="col-span-full grid grid-cols-3">
        @for($i = 0; $i < 3; $i++)
            <x-shared.single-blog />
        @endfor
    </div>
</div>
