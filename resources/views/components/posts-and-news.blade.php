<div class="grid grid-cols-1 lg:grid-cols-5 gap-4 lg:gap-y-6 lg:gap-x-12 container">
    <div class="col-span-1 lg:col-span-3 order-1 lg:order-1">
        <x-layouts.section
            title="Blogs"
            link-url="#"
            link-label="View All"
        >
            <x-shared.featured-blog :post="$posts->first()" />
        </x-layouts.section>
    </div>
    <div class="col-span-1 lg:col-span-2 order-3 lg:order-2">
        <x-layouts.section
            title="News"
            link-url="#"
            link-label="View All"
        >
            These are my news
        </x-layouts.section>
    </div>
    <div class="col-span-full grid grid-cols-1 lg:grid-cols-3 order-2 lg:order-3 gap-4 lg:gap-6">
        @foreach($posts->slice(1) as $post)
            <x-shared.single-blog :$post />
        @endforeach
    </div>
</div>
