<?php

namespace Altynbek07\Uds;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UdsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/uds.php' => config_path('uds.php'),
            ], 'config');
        }

        Route::middlewareGroup('uds', config('uds.middleware', []));

        $this->registerRoutes();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/uds.php', 'uds');

        $this->app->alias(Uds::class, 'laravel-uds');
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        });
    }

    /**
     * Get the Uds route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'namespace' => 'Altynbek07\Uds\Http\Controllers',
            'prefix' => config('uds.path'),
            'middleware' => 'uds',
        ];
    }
}
