<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('LandingPage');
})->name('landing-page');

Route::group([
    'prefix' => '/newsletter',
    'as' => 'newsletter.',
    'controller' => \App\Http\Controllers\NewsletterController::class
], function () {
    Route::post('/subscribe', 'subscribe')->name('subscribe');
});
