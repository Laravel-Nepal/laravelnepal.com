<?php

declare(strict_types=1);

use Livewire\Livewire;

it('renders the shared filter input as a single-file component', function (): void {
    Livewire::test('shared::filter-input', ['label' => 'post'])
        ->assertStatus(200);
});
