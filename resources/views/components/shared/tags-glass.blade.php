<div class="glass p-8 rounded-4xl space-y-8">
    <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-neutral-400 mb-6">
        {{ $title }}
    </h4>
    <div class="flex flex-wrap gap-4">
        @foreach($tags as $tag)
            <span class="badge">{{ ucwords($tag) }}</span>
        @endforeach
    </div>
</div>
