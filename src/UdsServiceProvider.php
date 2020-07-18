<?php

namespace Altynbek07\Uds;

use Altynbek07\Uds\Commands\UdsCommand;
use Illuminate\Support\ServiceProvider;

class UdsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/uds.php' => config_path('uds.php'),
            ], 'config');

            $this->commands([
                UdsCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/uds.php', 'uds');
    }
}
