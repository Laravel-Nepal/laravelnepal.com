<?php

declare(strict_types=1);

it('registers every page route as a livewire page route backed by a single-file component', function (): void {
    $pageRoutes = [
        'page.post.index' => 'post-index',
        'page.post.view' => 'post-view',
        'page.tips.index' => 'tip-index',
        'page.tips.view' => 'tip-view',
        'page.project.index' => 'project-index',
        'page.project.view' => 'project-view',
        'page.package.index' => 'package-index',
        'page.package.view' => 'package-view',
        'page.artisan.index' => 'artisan-index',
        'page.artisan.view' => 'artisan-view',
    ];

    $routes = collect(app('router')->getRoutes()->getRoutes());

    foreach ($pageRoutes as $routeName => $componentFile) {
        $route = $routes->first(fn (Illuminate\Routing\Route $route): bool => $route->getName() === $routeName);

        expect($route)->not->toBeNull("Route [{$routeName}] should exist")
            ->and($route->getActionName())->toBeString()
            ->and($route->getActionName())->toContain('LivewirePageController')
            ->and(file_exists(resource_path("views/components/page/{$componentFile}.blade.php")))
            ->toBeTrue("SFC file for [{$routeName}] should exist");
    }
});
