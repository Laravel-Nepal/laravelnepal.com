<div class="grid grid-cols-1 lg:grid-cols-5 gap-4 lg:gap-y-6 lg:gap-x-12 container scroll-mt-24" id="explore">
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
            <div class="glass rounded-4xl w-full p-6 flex-1 flex flex-col gap-6">
                @forelse($news as $newsItem)
                    <x-shared.simple-blog :post="$newsItem" />
                @empty
                    <p class="text-center text-neutral-500 col-span-full">No news available.</p>
                @endforelse
            </div>
        </x-layouts.section>
    </div>
    <div class="col-span-full grid grid-cols-1 lg:grid-cols-3 order-2 lg:order-3 gap-4 lg:gap-6">
        @foreach($posts->slice(1) as $post)
            <x-shared.single-blog :$post />
        @endforeach
    </div>
</div>
