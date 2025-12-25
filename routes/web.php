<?php

declare(strict_types=1);

use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/',
], function (): void {
//    Route::group([
//        'as' => 'page.',
//    ], function (): void {
//        Route::inertia('/', 'LandingPage')->name('landingPage');
//    });

    Route::group([
        'prefix' => '/newsletter',
        'as' => 'newsletter.',
        'controller' => NewsletterController::class,
    ], function (): void {
        Route::post('/subscribe', 'subscribe')->name('subscribe');
    });
});
