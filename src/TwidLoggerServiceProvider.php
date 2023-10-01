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

    public function boot()
    {
        //php artisan vendor:publish --tag=config
        $this->publishes([__DIR__ . '/config/publish.php' => dirname(__DIR__, 4) . '/config/logging.php'], 'config');
    }
}
