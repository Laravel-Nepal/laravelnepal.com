<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Contracts\Contentable;
use App\Models\Comment;
use CyrildeWit\EloquentViewable\Visitor;
use Illuminate\View\View;
use Livewire\Attributes\Transition;
use Livewire\Component;

final class Comments extends Component
{
    public Contentable $content;

    public string $visitor = '';

    public string $name = '';

    public string $message = '';

    public function mount(): void
    {
        $this->visitor = resolve(Visitor::class)->id();
    }

    #[Transition]
    public function addComment(): void
    {
        $this->validate([
            'name' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Comment::create([
            'commentable_type' => $this->content->getMorphClass(),
            'commentable_id' => $this->content->getKey(),
            'content' => $this->message,
            'visitor' => $this->visitor,
        ]);

        $this->reset('name', 'message');
    }

    public function render(): View
    {
        return view('livewire.comments');
    }
}
