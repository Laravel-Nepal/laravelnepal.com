<a href="#" class="block group relative rounded-4xl overflow-hidden aspect-video glass w-full">
    <div class="absolute inset-0 bg-linear-to-tr from-laravel-red/10 group-hover:from-laravel-red/20 to-transparent"></div>
    <div class="absolute bottom-0 left-0 p-8 md:p-12">
        <div
            @class([
                "flex justify-start items-center flex-wrap gap-4 h-full mb-4"
            ])
        >
            @foreach($post->tags as $tag)
                <div class="badge">
                    {{ ucwords($tag) }}
                </div>
            @endforeach
        </div>
        <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold leading-tight mb-4 group-hover:underline decoration-laravel-red decoration-2 underline-offset-8">
            {{ $post->title }}
        </h2>
        <p class="text-zinc-300 max-w-xl text-sm md:text-base">
            {{ $post->author->name }} &middot; {{ $post->date->format('M d, Y') }} &middot; {{ $post->minutes_read_text }}
        </p>
    </div>
</a>
