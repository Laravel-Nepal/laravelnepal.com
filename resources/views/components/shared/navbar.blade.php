@php
    use App\Settings\SiteSettings;
    $siteSettings = app(SiteSettings::class);
@endphp
<nav class="dock-container" id="dock">
    <div class="dock rounded-full px-4 py-3 flex items-center gap-2">
        <a href="{{ route('page.landingPage') }}">
            @if($siteSettings->logo)
                <img src="{{ asset('/storage/'.$siteSettings->logo) }}" alt="{{ $siteSettings->name }} Logo" class="h-10 w-10 object-contain rounded-full">
            @else
                <span class="w-10 h-10 bg-laravel-red rounded-full flex items-center justify-center font-black text-xs hover:scale-110 transition">
                    LN
                </span>
            @endif
        </a>
        <div class="h-6 w-px bg-white/10 mx-2"></div>
        <div class="flex gap-1">
            <a href="#feed" class="nav-item active">Feed</a>
            <a href="#blogs" class="nav-item">Blogs</a>
            <a href="#authors" class="nav-item">Authors</a>
            <a href="#projects" class="nav-item">Explore</a>
        </div>
    </div>
</nav>
