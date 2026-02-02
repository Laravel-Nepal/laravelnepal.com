<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    @php
        use App\Settings\SiteSettings;
        $siteSettings = app(SiteSettings::class);
    @endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if($siteSettings->favicon)
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/storage/'.$siteSettings->favicon) }}">
    @endif
    @if(config('app.env') !== 'production')
        <meta name="robots" content="noindex, nofollow">
    @endif

    @stack('seo')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        rel="preload"
        as="style"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        onload="this.onload=null;this.rel='stylesheet'"
    >
    <noscript>
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        >
    </noscript>

    {!! $siteSettings->header_scripts !!}

    @vite(["resources/js/app.js", "resources/css/app.css"])
    @livewireStyles
    @stack('styles')
</head>
<body class="container-xl antialiased bg-[#050505] text-white overflow-x-hidden">
    <x-shared.navbar />
    <div class="bg"></div>
    {{ $slot }}
    <x-shared.footer />

    @livewireScripts
    @stack('scripts')
    {!! $siteSettings->footer_scripts !!}
</body>
</html>
