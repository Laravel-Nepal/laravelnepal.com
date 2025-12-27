<div class="glass p-8 rounded-4xl space-y-8">
    <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-neutral-400 mb-6">
        {{ $title ?? 'Share' }}
    </h4>
    <div class="flex flex-wrap gap-4">
        <a href="{{ $share->gmail() }}" alt="Share via Gmail">
            {{ svg('fab-google', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->linkedin() }}" alt="Share via LinkedIn">
            {{ svg('fab-linkedin', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->facebook() }}" alt="Share via Facebook">
            {{ svg('fab-facebook-f', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->twitter() }}" alt="Share via X (Twitter)">
            {{ svg('fab-x-twitter', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->whatsapp() }}" alt="Share via WhatsApp">
            {{ svg('fab-whatsapp', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->viber() }}" alt="Share via Viber">
            {{ svg('fab-viber', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->reddit() }}" alt="Share via Reddit">
            {{ svg('fab-reddit', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
        <a href="{{ $share->telegram() }}" alt="Share via Telegram">
            {{ svg('fab-telegram', 'text-white hover:text-laravel-red w-6 h-6') }}
        </a>
    </div>
</div>
