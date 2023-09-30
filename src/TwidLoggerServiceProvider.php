<?php

namespace twid\logger;

use Illuminate\Support\ServiceProvider;

class TwidLoggerServiceProvider extends ServiceProvider
{
    public function register()
    {
         $this->app->bind('twid.logger', function ($app) {
            return new Logger();
        });
    }

    //php artisan vendor:publish --tag=config
    public function boot()
    {
        $this->publishes([__DIR__ . '/config/logging.php' => config_path('logging.php')], 'config');
    }
}
