@php($settings = resolve(App\Settings\SiteSettings::class))

<footer class="py-20 border-t border-white/5 text-center mt-20" id="footer">
    @if($settings->logo)
        <img
            src="{{ asset('/storage/'.$settings->logo) }}"
            alt="{{ $settings->name }} Logo"
            class="p-1 object-cover w-24 h-24 mb-4 mx-auto"
        />
    @endif

    <a href="{{ route('page.landingPage') }}" class="text-neutral-300 uppercase tracking-[0.4em]">
        {{ $settings->name }}
    </a>
    <div
        class="prose prose-invert max-w-2xl prose-a:text-laravel-red prose-a:font-bold mx-auto text-sm text-neutral-400 px-6 mt-8 uppercase leading-loose">
        @markdown($settings->footer_text)
    </div>
</footer>
