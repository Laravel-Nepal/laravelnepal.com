<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Contracts\Contentable;
use App\Models\Comment;
use CyrildeWit\EloquentViewable\Contracts\Visitor;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

final class Comments extends Component
{
    public Contentable $content;

    #[Validate('nullable|string|max:255')]
    public string $name = '';

    #[Validate('required|string|max:1000')]
    public string $message = '';

    public function addComment(): void
    {
        $this->validate();

        $visitor = app(Visitor::class);

        Comment::create([
            'commentable_type' => $this->content->getMorphClass(),
            'commentable_id' => $this->content->getKey(),
            'content' => $this->pull('message'),
            'visitor' => $visitor->id(),
        ]);

        if ($this->name !== '') {
            $guest = $visitor->guest();

            $guest->update([
                'name' => $this->pull('name'),
            ]);
        }
    }

    public function render(): View
    {
        return view('livewire.comments');
    }
}
