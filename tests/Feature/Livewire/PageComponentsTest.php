<?php

declare(strict_types=1);

it('registers the posts index as a livewire page route', function (): void {
    $route = collect(app('router')->getRoutes()->getRoutes())
        ->first(fn (Illuminate\Routing\Route $route): bool => $route->getName() === 'page.post.index');

    expect($route)->not->toBeNull();
});

it('registers the tips index as a livewire page route', function (): void {
    $route = collect(app('router')->getRoutes()->getRoutes())
        ->first(fn (Illuminate\Routing\Route $route): bool => $route->getName() === 'page.tips.index');

    expect($route)->not->toBeNull();
});
