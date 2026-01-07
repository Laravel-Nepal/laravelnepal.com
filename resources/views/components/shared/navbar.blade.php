@php
    use App\Settings\SiteSettings;
    $siteSettings = app(SiteSettings::class);
@endphp
<nav class="dock-container" id="dock">
    <div class="dock rounded-full px-4 py-3 flex items-center gap-2">
        <a href="{{ route('page.landingPage') }}" class="block group w-10 h-10 shrink-0">
            <span
                @class([
                    "w-10 h-10 rounded-xl flex items-center justify-center font-black text-xs group-hover:scale-110 transition",
                    $siteSettings->logo ? 'bg-[#faf9fe]' : 'bg-laravel-red'
                ])
            >
                @if($siteSettings->logo)
                    <img
                        src="{{ asset('/storage/'.$siteSettings->logo) }}"
                        alt="{{ $siteSettings->name }} Logo"
                        class="p-1 object-cover rounded-full"
                    />
                @else
                    LN
                @endif
            </span>
        </a>
        <div class="h-6 w-px bg-white/10 mx-2"></div>
        <div class="flex gap-2 w-full">
            <a
                href="{{ route('page.post.index') }}"
                @class([
                    "nav-item",
                    "active" => request()->routeIs('page.post.index') || request()->routeIs('page.post.view')
                ])
            >
                Blogs
            </a>
            <a
                href="{{ route('page.tips.index') }}"
                @class([
                    "nav-item",
                    "active" => request()->routeIs('page.tips.index') || request()->routeIs('page.tips.view')
                ])
            >
                Tips
            </a>
            <a
                href="{{ route('page.project.index') }}"
                @class([
                    "nav-item",
                    "active" => request()->routeIs('page.project.index') || request()->routeIs('page.project.view')
                ])
            >
                Projects
            </a>
            <a
                href="{{ route('page.package.index') }}"
                @class([
                    "nav-item",
                    "active" => request()->routeIs('page.package.index') || request()->routeIs('page.package.view')
                ])
            >
                Packages
            </a>
            <a
                href="{{ route('page.artisan.index') }}"
                @class([
                    "nav-item",
                    "active" => request()->routeIs('page.artisan.index') || request()->routeIs('page.artisan.view')
                ])
            >
                Artisans
            </a>
        </div>
    </div>
</nav>
