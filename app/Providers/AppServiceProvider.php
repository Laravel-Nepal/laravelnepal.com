<?php

declare(strict_types=1);

namespace App\Providers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
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

        Gate::define('viewPulse', function (User $user): bool {
            return $user->role === UserRole::Admin;
        });
    }
}
