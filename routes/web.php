<?php

declare(strict_types=1);

use App\Http\Controllers\RenderPackageView;
use App\Http\Controllers\RenderPostIndex;
use App\Http\Controllers\RenderPostView;
use App\Http\Controllers\RenderProjectView;
use App\Http\Controllers\RenderTipIndex;
use App\Http\Controllers\RenderTipView;
use App\Http\Controllers\SubscribeToNewsletter;

Route::group([
    'prefix' => '/',
], function (): void {
    Route::group([
        'as' => 'page.',
    ], function (): void {
        Route::view('/', 'components.page.landing-page')
            ->name('landingPage');

        Route::group([
            'prefix' => '/post',
            'as' => 'post.',
        ], function (): void {
            Route::get('/', RenderPostIndex::class)
                ->name('index');
            Route::get('/{post}', RenderPostView::class)
                ->name('view');
        });

        Route::group([
            'prefix' => '/tip',
            'as' => 'tips.',
        ], function (): void {
            Route::get('/', RenderTipIndex::class)
                ->name('index');
            Route::get('/{tip}', RenderTipView::class)
                ->name('view');
        });

        Route::group([
            'prefix' => '/project',
            'as' => 'project.',
        ], function (): void {
            Route::get('/{project}', RenderProjectView::class)
                ->name('view');
        });

        Route::group([
            'prefix' => '/package',
            'as' => 'package.',
        ], function (): void {
            Route::get('/{package}', RenderPackageView::class)
                ->name('view');
        });
    });

    Route::group([
        'prefix' => '/newsletter',
        'as' => 'newsletter.',
    ], function (): void {
        Route::post('/subscribe', SubscribeToNewsletter::class)
            ->name('subscribe');
    });
});
