@props(['label' => '', 'value' => '', 'link' => null])

<div>
    <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">
        {{ $label }}
    </p>
    @if($link)
        <a href="{{ $link }}" target="_blank" class="text-sm font-bold mt-1 text-zinc-300 hover:text-laravel-red transition-colors">
            {{ $value }}
        </a>
    @else
        <p class="text-sm font-bold mt-1 text-zinc-300">
            {{ $value }}
        </p>
    @endif
</div>
