<?php

declare(strict_types=1);

use App\Models\Comment;
use App\Models\Post;
use Livewire\Livewire;

it('renders the shared filter input as a single-file component', function (): void {
    Livewire::test('shared::filter-input', ['label' => 'post'])
        ->assertStatus(200);
});

it('renders the shared checkbox glass as a single-file component', function (): void {
    Livewire::test('shared::checkbox-glass', [
        'arrayValues' => [['value' => 'laravel', 'bracketValue' => 3]],
    ])
        ->assertStatus(200);
});

it('toggles a vote on the shared vote glass in a single request', function (): void {
    $comment = Comment::query()->create([
        'commentable_type' => Post::class,
        'commentable_id' => 1,
        'content' => 'A test comment',
        'visitor' => 'test-visitor',
    ]);

    Livewire::test('shared::vote-glass', ['content' => $comment])
        ->assertStatus(200)
        ->assertSet('count', 0)
        ->assertSet('active', false)
        ->call('toggleVote')
        ->assertSet('count', 1)
        ->assertSet('active', true);

    expect($comment->getTotalVotes())->toBe(1);
});

it('renders the static vote copy in the lazy placeholder', function (): void {
    $comment = Comment::query()->create([
        'commentable_type' => Post::class,
        'commentable_id' => 1,
        'content' => 'A test comment',
        'visitor' => 'test-visitor',
    ]);

    Livewire::test('shared::vote-glass', ['content' => $comment])
        ->assertSee('Appreciate')
        ->assertSee('Show some support to this');
});

it('supports modelable binding on the filter input', function (): void {
    Livewire::test('shared::filter-input', ['label' => 'post'])
        ->set('value', 'laravel')
        ->assertSet('value', 'laravel');
});

it('supports modelable binding on the checkbox glass', function (): void {
    Livewire::test('shared::checkbox-glass', [
        'arrayValues' => [['value' => 'laravel', 'bracketValue' => 3]],
    ])
        ->set('value', ['laravel'])
        ->assertSet('value', ['laravel']);
});
