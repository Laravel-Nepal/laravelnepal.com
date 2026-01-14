<a href="{{ route('page.post.view', $post) }}" class="glass p-6 rounded-4xl hover:-translate-y-2 transition-transform group/blog">
    <div class="h-40 bg-zinc-900 rounded-2xl mb-4 overflow-hidden relative">
        <div
            @class([
                "flex justify-center items-center flex-wrap gap-x-4 h-full",
                "bg-linear-to-tr from-laravel-red/20 group-hover/blog:from-laravel-red/30 to-transparent"
            ])
        >
            @foreach($post->tags as $tag)
                <div class="badge">
                    {{ ucwords($tag) }}
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-neutral-400 text-xs font-mono uppercase tracking-widest mb-2">
        {{ $post->date->format('M d, Y') }}
    </div>
    <h4 class="font-bold text-xl mb-2 group-hover/blog:text-laravel-red transition">
        {{ $post->title }}
    </h4>
    <p class="text-zinc-400 text-xs font-bold">
        {{ $post->author->name }} &middot; {{ $post->minutes_read_text }}
    </p>
</a>
