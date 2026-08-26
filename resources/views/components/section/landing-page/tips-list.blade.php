<?php

use App\Models\Tip;
use Illuminate\Support\Collection;
use Livewire\Component;

new class extends Component
{
    /** @var Collection<int, Tip> */
    public Collection $tips;

    public function mount(): void
    {
        $this->tips = Tip::query()
            ->latest()
            ->take(6)
            ->get();
    }
};
?>

<x-layouts.section
    title="Tips"
    class="container mt-18"
>
    <div class="grid grid-cols-1 lg:grid-cols-3 order-2 lg:order-3 gap-4 lg:gap-6 w-full">
        @foreach($tips as $tip)
            <x-shared.tip-component :$tip />
        @endforeach
    </div>
</x-layouts.section>