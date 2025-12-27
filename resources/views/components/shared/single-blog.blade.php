<a href="#" class="glass p-6 rounded-4xl hover:-translate-y-2 transition-transform group">
    <div class="h-40 bg-zinc-900 rounded-2xl mb-4 overflow-hidden relative">
        <div
            @class([
                "flex justify-center items-center flex-wrap gap-4 h-full",
                "bg-linear-to-tr from-laravel-red/20 group-hover:from-laravel-red/30 to-transparent"
            ])
        >
            @foreach($post->tags as $tag)
                <div class="badge">
                    {{ ucwords($tag) }}
                </div>
            @endforeach
        </div>
    </div>
    <h4 class="font-bold text-xl mb-2 group-hover:text-laravel-red transition">
        {{ $post->title }}
    </h4>
    <p class="text-zinc-300 max-w-xl text-sm md:text-base">
        {{ $post->author->name }} &middot; {{ $post->date->format('M d, Y') }} &middot; {{ $post->minutes_read_text }}
    </p>
</a>
