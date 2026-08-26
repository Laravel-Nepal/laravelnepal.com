<?php

declare(strict_types=1);

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

it('toggles the shared vote content and dispatches events', function (): void {
    Livewire::test('shared::vote-content', ['count' => 0, 'active' => false])
        ->assertStatus(200)
        ->call('toggleVote')
        ->assertSet('count', 1)
        ->assertSet('active', true);
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
