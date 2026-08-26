<?php

declare(strict_types=1);

use App\Http\Controllers\RenderArtisanView;
use App\Http\Controllers\RenderOpenGraphImage;
use App\Http\Controllers\RenderPackageView;
use App\Http\Controllers\SubscribeToNewsletter;

Route::group([
    'as' => 'page.',
], function (): void {
    Route::view('/', 'components.page.landing-page')->name('landingPage');

    Route::group([
        'prefix' => '/post',
        'as' => 'post.',
    ], function (): void {
        Route::livewire('/', 'pages::post.index')->name('index');
        Route::livewire('/{post}', 'pages::post.view')->name('view');
    });

    Route::group([
        'prefix' => '/tip',
        'as' => 'tips.',
    ], function (): void {
        Route::livewire('/', 'pages::tip.index')->name('index');
        Route::livewire('/{tip}', 'pages::tip.view')->name('view');
    });

    Route::group([
        'prefix' => '/project',
        'as' => 'project.',
    ], function (): void {
        Route::livewire('/', 'pages::project.index')->name('index');
        Route::livewire('/{project}', 'pages::project.view')->name('view');
    });

    Route::group([
        'prefix' => '/package',
        'as' => 'package.',
    ], function (): void {
        Route::livewire('/', 'pages::package.index')->name('index');
        Route::get('/{package}', RenderPackageView::class)->name('view');
    });

    Route::group([
        'as' => 'artisan.',
    ], function (): void {
        Route::get('/@{author}', RenderArtisanView::class)->name('view');

        Route::group([
            'prefix' => '/artisan',
        ], function (): void {
            Route::livewire('/', 'pages::artisan.index')->name('index');
        });
    });

    Route::get('/open-graph/{model}/{key}', RenderOpenGraphImage::class)->name('openGraphImage');
});

Route::group([
    'prefix' => '/newsletter',
    'as' => 'newsletter.',
], function (): void {
    Route::post('/subscribe', SubscribeToNewsletter::class)->name('subscribe');
});
