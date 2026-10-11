<?php

use Livewire\Component;

new class extends Component
{
};
?>

<div
    x-data="nepalClock"
    class="flex flex-col"
>
    <p x-text="nepalTime" class="text-3xl font-black mt-1 text-laravel-red leading-none">
        {{ now()->format('h:i A') }}
    </p>

    <span x-text="relativeDiff" class="text-[10px] font-mono font-bold text-zinc-500 tracking-widest mt-1 uppercase">
        Local Time
    </span>
</div>
