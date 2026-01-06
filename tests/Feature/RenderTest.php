<?php

declare(strict_types=1);

use AchyutN\LaravelSEO\Data\Breadcrumb;
use AchyutN\LaravelSEO\Services\SEOService;

beforeEach(function () {
    $seoService = app(SEOService::class);

    $classes = collect($seoService->seoModels());

    $this->testObjects = $classes->map(function ($class) {
        return $class::all();
    })->flatten();
});

it('should render all pages without error', function () {
    foreach ($this->testObjects as $object) {
        $url = $object->getURLValue();

        $response = $this->get($url);
        $response->assertStatus(200);

        expect($object->breadcrumbs())
            ->toBeArray()
            ->each
            ->toBeInstanceOf(Breadcrumb::class);
    }
});
