<?php

namespace twid\logger\Facades;

use Illuminate\Support\Facades\Facade;
use twid\logger\Logger;

class TLog extends Facade
{
    protected static $loggers = [];

    protected static function getLogger($channel = 'default')
    {
        if (!isset(self::$loggers[$channel])) {
            self::$loggers[$channel] = new Logger($channel);
        }

        return self::$loggers[$channel];
    }

    public static function __callStatic($method, $args)
    {
        // If the method is not explicitly defined, treat it as a channel name
        return self::getLogger($method)->log($args[0], $args[1] ?? []);
    }

    protected static function getFacadeAccessor()
    {
        return 'twid.logger';
    }
}
