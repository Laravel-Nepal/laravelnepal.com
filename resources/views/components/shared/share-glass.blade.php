<div class="glass p-8 rounded-4xl space-y-8">
    <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-neutral-400 mb-6">
        {{ $title ?? 'Share' }}
    </h4>
    <div class="flex flex-wrap gap-4">
        <div
            x-data="{
                copied: false,
                copyLink() {
                    navigator.clipboard.writeText('{{ $share->url }}');
                    this.copied = true;
                    setTimeout(() => this.copied = false, 2000);
                }
            }"
            class="relative"
        >
            <button
                @click="copyLink"
                class="cursor-pointer transition-all duration-300 group relative"
                aria-label="Copy to Clipboard"
            >
                {{ svg('fas-link', 'text-white group-hover:text-laravel-red w-6 h-6') }}

                <span
                    x-show="copied"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="absolute -top-10 left-1/2 -translate-x-1/2 bg-laravel-red text-white text-[9px] font-black px-2 py-1 rounded-md tracking-widest uppercase pointer-events-none"
                    style="display: none;"
                >
                    Copied!
                </span>
            </button>
        </div>
        <a href="{{ $share->gmail() }}" target="_blank" alt="Share via Gmail">
            {{ svg('fab-google', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->linkedin() }}" target="_blank" alt="Share via LinkedIn">
            {{ svg('fab-linkedin', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->facebook() }}" target="_blank" alt="Share via Facebook">
            {{ svg('fab-facebook-f', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->twitter() }}" target="_blank" alt="Share via X (Twitter)">
            {{ svg('fab-x-twitter', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->whatsapp() }}" target="_blank" alt="Share via WhatsApp">
            {{ svg('fab-whatsapp', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->viber() }}" target="_blank" alt="Share via Viber">
            {{ svg('fab-viber', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->reddit() }}" target="_blank" alt="Share via Reddit">
            {{ svg('fab-reddit', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->telegram() }}" target="_blank" alt="Share via Telegram">
            {{ svg('fab-telegram', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
    </div>
</div>

@pushonce('scripts')
    <script defer src="//cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpushonce
