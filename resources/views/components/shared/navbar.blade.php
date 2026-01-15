@php
    use App\Settings\SiteSettings;
    $siteSettings = app(SiteSettings::class);

    $navLinks = [
        ['route' => 'page.post.index', 'label' => 'Blogs', 'active' => 'page.post.*'],
        ['route' => 'page.tips.index', 'label' => 'Tips', 'active' => 'page.tips.*'],
        ['route' => 'page.project.index', 'label' => 'Projects', 'active' => 'page.project.*'],
        ['route' => 'page.package.index', 'label' => 'Packages', 'active' => 'page.package.*'],
        ['route' => 'page.artisan.index', 'label' => 'Artisans', 'active' => 'page.artisan.*'],
    ];
@endphp

<nav class="dock-container" id="dock" x-data="{ mobileOpen: false }">
    <div class="relative">
        <div
            x-show="mobileOpen"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-8 scale-90"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-8 scale-90"
            @click.away="mobileOpen = false"
            class="absolute bottom-full mb-6 left-1/2 -translate-x-1/2 w-[calc(100vw-3rem)] max-w-xs glass rounded-[2.5rem] p-6 lg:hidden"
        >
            <div class="flex flex-wrap justify-center gap-3">
                @foreach($navLinks as $link)
                    <a
                        href="{{ route($link['route']) }}"
                        @class([
                            "px-4 py-2 rounded-full text-xs font-bold transition-all border",
                            request()->routeIs($link['active'])
                                ? "bg-laravel-red border-laravel-red text-white shadow-[0_0_15px_rgba(255,45,32,0.3)]"
                                : "bg-white/5 border-white/5 text-zinc-400"
                        ])
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="dock rounded-full px-4 py-3 flex items-center gap-2">
            <a href="{{ route('page.landingPage') }}" class="block group w-10 h-10 shrink-0">
                <span @class([
                    "w-10 h-10 rounded-xl flex items-center justify-center font-black text-xs group-hover:scale-110 transition",
                    $siteSettings->logo ? 'bg-[#faf9fe]' : 'bg-laravel-red'
                ])>
                    @if($siteSettings->logo)
                        <img
                            src="{{ asset('/storage/'.$siteSettings->logo) }}"
                            alt="Logo"
                            class="p-1 object-cover rounded-xl w-10 h-10"
                        />
                    @else
                        LN
                    @endif
                </span>
            </a>

            <div class="h-6 w-px bg-white/10 mx-2"></div>

            <div class="hidden lg:flex gap-2">
                @foreach($navLinks as $link)
                    <a
                        href="{{ route($link['route']) }}"
                        @class([
                            "nav-item",
                            "active" => request()->routeIs($link['active'])
                        ])
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <button
                @click="mobileOpen = !mobileOpen"
                class="lg:hidden flex items-center gap-3 pl-2 pr-1 group"
            >
                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-zinc-500 group-hover:text-zinc-300 transition-colors">
                    Menu
                </span>
                <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center text-zinc-500 group-hover:bg-white/10 group-hover:text-white transition-all">
                    <svg
                        class="w-4 h-4 transition-transform duration-500"
                        :class="mobileOpen ? 'rotate-180 text-laravel-red' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7" />
                    </svg>
                </div>
            </button>
        </div>
    </div>
</nav>
