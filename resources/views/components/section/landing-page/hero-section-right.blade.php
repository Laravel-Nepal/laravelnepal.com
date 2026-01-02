<div class="lg:col-span-5 relative animate__animated animate__fadeInRight">
    <div class="glass p-8 rounded-[2.5rem] relative z-10 overflow-hidden group">
        <div class="flex justify-between mb-8">
            <div>
                <p class="text-xs text-zinc-500 font-bold uppercase tracking-widest">Artisans</p>
                <h4 class="text-3xl font-black mt-1">
                    {{ Number::abbreviate($authors) }}@if($authors > 1000)+@endif
                </h4>
            </div>
            <div class="text-right">
                <p class="text-xs text-zinc-500 font-bold uppercase tracking-widest">Current Time</p>
                <x-section.landing-page.time-block />
            </div>
        </div>

        <div class="space-y-4">
            <div class="bg-white/5 rounded-2xl border border-white/5 hover:border-laravel-red/30 transition-all cursor-pointer p-4">
                <x-shared.simple-blog
                    :$post
                />
            </div>
            <div class="bg-white/5 rounded-2xl border border-white/5 hover:border-laravel-red/30 transition-all cursor-pointer p-4">
                <x-shared.simple-tip
                    :$tip
                />
            </div>
        </div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-laravel-red blur-[80px] opacity-20 group-hover:opacity-40 transition-opacity"></div>
    </div>

    <div class="absolute -top-10 -right-5 w-20 h-20 glass rounded-2xl animate-float rotate-12 flex items-center justify-center text-5xl shadow-2xl select-none">
        🇳🇵
    </div>
</div>
