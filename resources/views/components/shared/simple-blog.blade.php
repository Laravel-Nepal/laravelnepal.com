<a href="#" class="group/item border-b border-white/20 pb-6 last:border-0 last:pb-0">
    <p class="text-[10px] text-neutral-300 font-mono block mb-2">
        {{ $post->author->name }} &middot; {{ $post->date->format('M d, Y') }} &middot; {{ $post->minutes_read_text }}
    </p>
    <h3 class="font-bold text-lg leading-tight group-hover/item:text-laravel-red transition">
        {{ $post->title }}
    </h3>
</a>
