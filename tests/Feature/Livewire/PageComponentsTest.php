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

it('registers the projects index as a livewire page route', function (): void {
    $route = collect(app('router')->getRoutes()->getRoutes())
        ->first(fn (Illuminate\Routing\Route $route): bool => $route->getName() === 'page.project.index');

    expect($route)->not->toBeNull();
});

it('registers the packages index as a livewire page route', function (): void {
    $route = collect(app('router')->getRoutes()->getRoutes())
        ->first(fn (Illuminate\Routing\Route $route): bool => $route->getName() === 'page.package.index');

    expect($route)->not->toBeNull();
});

it('registers the artisans index as a livewire page route', function (): void {
    $route = collect(app('router')->getRoutes()->getRoutes())
        ->first(fn (Illuminate\Routing\Route $route): bool => $route->getName() === 'page.artisan.index');

    expect($route)->not->toBeNull();
});

it('registers the post view as a livewire page route', function (): void {
    $route = collect(app('router')->getRoutes()->getRoutes())
        ->first(fn (Illuminate\Routing\Route $route): bool => $route->getName() === 'page.post.view');

    expect($route)->not->toBeNull();
});
