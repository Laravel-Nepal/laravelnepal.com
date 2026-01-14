@php
    use App\Settings\SiteSettings;
    $siteSettings = app(SiteSettings::class);


    $links = [
        ['route' => 'page.post.index', 'label' => 'Blogs', 'active' => 'page.post.*'],
        ['route' => 'page.tips.index', 'label' => 'Tips', 'active' => 'page.tips.*'],
        ['route' => 'page.project.index', 'label' => 'Projects', 'active' => 'page.project.*'],
        ['route' => 'page.package.index', 'label' => 'Packages', 'active' => 'page.package.*'],
        ['route' => 'page.artisan.index', 'label' => 'Artisans', 'active' => 'page.artisan.*'],
    ];
@endphp
<nav class="dock-container fixed bottom-8 left-1/2 -translate-x-1/2 z-100" id="dock" x-data="{ open: false }">
    <div class="relative">

        <div
            x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 scale-95"
            @click.away="open = false"
            class="absolute bottom-full mb-4 left-1/2 -translate-x-1/2 w-[90vw] max-w-sm glass rounded-[2.5rem] p-6 lg:hidden"
        >
            <div class="flex flex-wrap justify-center gap-3">
                @foreach($links as $link)
                    <a
                        href="{{ route($link['route']) }}"
                        @class([
                            "px-4 py-2 rounded-full text-xs font-bold transition-all border",
                            request()->routeIs($link['active'])
                                ? "bg-laravel-red border-laravel-red text-white shadow-[0_0_15px_rgba(255,45,32,0.3)]"
                                : "bg-white/10 border-white/5 text-neutral-200 hover:text-white hover:bg-white/20"
                        ])
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="dock rounded-full px-4 py-3 flex items-center justify-between gap-2 shadow-2xl backdrop-blur-md border border-white/10 bg-black/20 w-full">
            <a href="{{ route('page.landingPage') }}" class="block group w-10 h-10 shrink-0">
                <span @class([
                    "w-10 h-10 rounded-xl flex items-center justify-center font-black text-xs group-hover:scale-110 transition shadow-sm",
                    $siteSettings->logo ? 'bg-[#faf9fe]' : 'bg-laravel-red'
                ])>
                    @if($siteSettings->logo)
                        <img src="{{ asset('/storage/'.$siteSettings->logo) }}" alt="Logo" class="p-1 object-cover rounded-xl" />
                    @else
                        LN
                    @endif
                </span>
            </a>

            <div class="hidden lg:flex items-center">
                <div class="h-6 w-px bg-white/10 mx-2"></div>
                <div class="flex gap-2">
                    @foreach($links as $link)
                        <a href="{{ route($link['route']) }}" @class(["nav-item", "active" => request()->routeIs($link['active'])])>
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <button
                @click="open = !open"
                class="lg:hidden flex items-center gap-2 pl-2 pr-1 transition-colors group w-full ml-auto"
            >
                <div @class([
                    "w-8 h-8 rounded-full flex items-center justify-center transition-all",
                    "bg-laravel-red text-white" => false,
                    "bg-white/5 text-neutral-500 group-hover:bg-white/10"
                ])>
                    <svg
                        class="w-4 h-4 transition-transform duration-300"
                        :class="open ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7" />
                    </svg>
                </div>
            </button>
        </div>
    </div>
</nav>
