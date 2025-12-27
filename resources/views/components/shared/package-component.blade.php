<div
    x-data="{
        copied: false,
        command: 'composer require {{ $package->packagist }}',
        copyToClipboard() {
            navigator.clipboard.writeText(this.command);
            this.copied = true;
            setTimeout(() => this.copied = false, 2000);
        }
    }"
    class="glass p-8 rounded-4xl flex flex-col justify-between group/package hover:border-laravel-red/50 transition-all duration-500 w-full relative overflow-hidden"
>
    <div class="absolute -top-6 -right-6 opacity-[0.03] group-hover/package:opacity-[0.1] transition-opacity">
        <svg class="w-32 h-32 fill-white" viewBox="0 0 24 24">
            <path
                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.041-1.416-4.041-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
        </svg>
    </div>

    <div class="relative z-10">
        <div class="flex justify-between items-start mb-6">
            <div class="flex flex-wrap gap-2">
                @foreach($package->tags as $tag)
                    <span class="badge">{{ ucwords($tag) }}</span>
                @endforeach
            </div>
            <a href="https://github.com/{{ $package->github }}" target="_blank" class="text-zinc-500 hover:text-white transition-all group-hover/package:scale-125">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.041-1.416-4.041-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
            </a>
        </div>

        <h3 class="text-2xl font-black mb-2 group-hover/package:text-laravel-red transition-colors">
            {{ $package->name }}
        </h3>

        <div class="bg-black/40 rounded-xl p-3 border border-white/5 relative group/code mb-6">
            <code class="text-[11px] font-mono text-zinc-300 block overflow-hidden whitespace-nowrap">
                <span class="text-laravel-red tracking-tighter">composer require</span> {{ $package->packagist }}
            </code>
            <button
                @click="copyToClipboard()"
                class="absolute right-2 top-1/2 -translate-y-1/2 p-1.5 rounded-md glass hover:bg-laravel-red transition-all cursor-pointer"
                :class="copied ? 'bg-green-600 border-green-500' : ''"
            >
                <svg x-show="!copied" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                <svg x-show="copied" class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </button>

            <span x-show="copied" x-transition class="absolute -top-8 right-0 text-[9px] font-bold bg-green-600 text-white px-2 py-1 rounded">COPIED!</span>
        </div>
    </div>

    <hr class="border-white/5 mb-4">

    <div class="mt-auto relative z-10 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="flex gap-4">
                <p class="text-zinc-400 text-xs font-bold">
                    {{ $package->author->name }}
                </p>
            </div>
        </div>
        <div class="flex gap-4">
            <a
                href="{{ $package->packagist_url }}"
                target="_blank"
                class="button-red small"
            >
                Packagist
            </a>
            <a href="#"
               class="button-outlined small">
                Explore
            </a>
        </div>
    </div>
</div>
