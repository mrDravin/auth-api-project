<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        $this->app->bind(
            \App\Http\Services\Interfaces\RegisterServiceInterface::class,
            \App\Http\Services\RegisterService::class
        );

        $this->app->bind(
            \App\Http\Services\Interfaces\LoginServiceInterface::class,
            \App\Http\Services\LoginService::class
        );
    }
}
