<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('LandingPage');
});

Route::group([
    'prefix' => '/',
    'as' => 'newsletter.',
], function () {
    Route::post('/subscribe', \App\Http\Controllers\Newsletter\SubscriberToNewsletter::class)->name('subscribe');
});
