<?php

declare(strict_types=1);

use App\Http\Controllers\NewsletterController;

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
            Route::view('/{post}', 'components.page.post-view')
                ->name('view');
        });
    });

    Route::group([
        'prefix' => '/newsletter',
        'as' => 'newsletter.',
        'controller' => NewsletterController::class,
    ], function (): void {
        Route::post('/subscribe', 'subscribe')->name('subscribe');
    });
});
