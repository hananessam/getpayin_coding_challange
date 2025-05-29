<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\Auth\Interfaces\AuthInterface::class,
            \App\Repositories\Auth\AuthRepository::class
        );

        $this->app->bind(
            \App\Repositories\Platform\Interfaces\PlatformInterface::class,
            \App\Repositories\Platform\PlatformRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
