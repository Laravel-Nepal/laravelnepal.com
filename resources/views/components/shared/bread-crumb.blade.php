<nav class="flex mb-8 text-[10px] font-bold uppercase tracking-widest text-zinc-500" aria-label="Breadcrumb">
    <ol class="flex flex-wrap items-center gap-2">
        @foreach($breadCrumb as $breadCrumbItem)
            @if(!$loop->first)
                <li class="flex items-center">
                    <span class="px-2">/</span>
                </li>
            @endif

            <li
                @class([
                    "flex items-center min-w-0",
                    "text-zinc-300" => $loop->last || !isset($breadCrumbItem['url']),
                ])
                @if($loop->last) aria-current="page" @endif
            >

                @if($loop->last || !isset($breadCrumbItem['url']))
                    <span class="truncate max-w-45 md:max-w-none">
                        {{ $breadCrumbItem['label'] }}
                    </span>
                @else
                    <a href="{{ $breadCrumbItem['url'] }}" wire:navigate.hover class="hover:text-laravel-red transition-colors whitespace-nowrap">
                        {{ $breadCrumbItem['label'] }}
                    </a>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
