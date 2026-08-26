<?php

declare(strict_types=1);

use App\Http\Controllers\RenderArtisanIndex;
use App\Http\Controllers\RenderArtisanView;
use App\Http\Controllers\RenderOpenGraphImage;
use App\Http\Controllers\RenderPackageView;
use App\Http\Controllers\RenderPostView;
use App\Http\Controllers\RenderProjectView;
use App\Http\Controllers\RenderTipView;
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
        Route::get('/{post}', RenderPostView::class)->name('view');
    });

    Route::group([
        'prefix' => '/tip',
        'as' => 'tips.',
    ], function (): void {
        Route::livewire('/', 'pages::tip.index')->name('index');
        Route::get('/{tip}', RenderTipView::class)->name('view');
    });

    Route::group([
        'prefix' => '/project',
        'as' => 'project.',
    ], function (): void {
        Route::livewire('/', 'pages::project.index')->name('index');
        Route::get('/{project}', RenderProjectView::class)->name('view');
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
            Route::get('/', RenderArtisanIndex::class)->name('index');
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
