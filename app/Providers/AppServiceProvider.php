<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Model::automaticallyEagerLoadRelationships();

        if (app()->environment('production')) {
            /** @var string $url */
            $url = config('app.url');

            URL::useOrigin($url);
            URL::forceScheme('https');
        }
    }
}
