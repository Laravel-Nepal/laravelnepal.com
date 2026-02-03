<a
    href="{{ route('page.tips.view', $tip) }}"
    wire:navigate.hover
    @class([
        $class,
        "group/item border-b border-white/20 last:border-0 last:pb-0",
    ])
>
    <p class="text-[10px] text-neutral-300 font-mono block mb-2">
        {{ $tip->author->name }} &middot; {{ $tip->date->format('M d, Y') }} &middot; {{ $tip->minutes_read_text }}
    </p>
    <h3 class="font-bold text-lg leading-tight group-hover/item:text-laravel-red transition">
        {{ $tip->title }}
    </h3>
</a>
