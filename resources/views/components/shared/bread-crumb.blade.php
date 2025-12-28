<nav class="flex mb-8 text-[10px] font-bold uppercase tracking-widest text-zinc-500" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-2">
        @foreach($breadCrumb as $breadCrumbItem)
            @if(!$loop->first)
                <li><span class="px-2">/</span></li>
            @endif

            @if($loop->last)
                <li class="text-zinc-300" aria-current="page">{{ $breadCrumbItem['label'] }}</li>
            @elseif(isset($breadCrumbItem['url']))
                <li><a href="{{ $breadCrumbItem['url'] }}" class="hover:text-laravel-red">{{ $breadCrumbItem['label'] }}</a></li>
            @else
                <li class="text-zinc-300" aria-current="page">{{ $breadCrumbItem['label'] }}</li>
            @endif
        @endforeach
    </ol>
</nav>
