<a href="#" class="block group relative rounded-4xl overflow-hidden aspect-video glass w-full">
{{--    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80&w=2000" class="absolute inset-0 w-full h-full object-cover -z-10 group-hover:scale-105 transition duration-700 opacity-60 grayscale group-hover:grayscale-0">--}}
    <div class="absolute bottom-0 left-0 p-8 md:p-12">
        @foreach($post->tags as $tag)
            <span class="badge">
                {{ ucwords($tag) }}
            </span>
        @endforeach
        <h2 class="text-3xl md:text-5xl font-bold leading-tight mb-4 group-hover:underline decoration-laravel-red decoration-2 underline-offset-8">
            {{ $post->title }}
        </h2>
        <p class="text-zinc-300 max-w-xl text-sm md:text-base">
            {{ $post->author->name }} &middot; {{ $post->date->format('M d, Y') }}
        </p>
    </div>
</a>
