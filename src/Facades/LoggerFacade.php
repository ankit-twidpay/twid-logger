<?php

namespace twid\logger\Facades;

use Illuminate\Support\Facades\Facade;
use twid\logger\Logger;

class LoggerFacade extends Facade
{
    protected static $loggers = [];

    protected static function getLogger($channel = 'default')
    {
        if (!isset(self::$loggers[$channel])) {
            self::$loggers[$channel] = new Logger($channel);
        }

        return self::$loggers[$channel];
    }

    public static function channel($channel)
    {
        return self::getLogger($channel);
    }

    public static function info($message, $data = [])
    {
        self::getLogger('info')->info($message, $data);
    }

    public static function warning($message, $data = [])
    {
        self::getLogger('warning')->warning($message, $data);
    }

    public static function critical($message, $data = [])
    {
        self::getLogger('critical')->critical($message, $data);
    }

    public static function error($message, $data = [])
    {
        self::getLogger('error')->error($message, $data);
    }

    public static function alert($message, $data = [])
    {
        self::getLogger('alert')->alert($message, $data);
    }

    public static function inbound($message, $data = [])
    {
        self::getLogger('inbound')->inbound($message, $data);
    }

    public static function outbound($message, $data = [])
    {
        self::getLogger('outbound')->outbound($message, $data);
    }

    public static function debug($message, $data = [])
    {
        self::getLogger('debug')->debug($message, $data);
    }
    
    protected static function getFacadeAccessor()
    {
        return 'twid.logger';
    }
}
