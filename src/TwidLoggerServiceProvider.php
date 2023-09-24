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
        $this->publishes([
            __DIR__ . '/../config/common-package.php' => config_path('log.php'),
        ], 'config');
    }
}
