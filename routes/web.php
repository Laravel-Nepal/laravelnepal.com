<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/',
], function () {
    Route::group([
        'as' => 'page.',
    ], function () {
        Route::inertia('/', 'LandingPage')->name('landingPage');
    });

    Route::group([
        'prefix' => '/newsletter',
        'as' => 'newsletter.',
        'controller' => \App\Http\Controllers\NewsletterController::class
    ], function () {
        Route::post('/subscribe', 'subscribe')->name('subscribe');
    });
});
