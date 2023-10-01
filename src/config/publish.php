<?php

use Monolog\Logger as MonologLogger;

return [
    'channels' => [
        'default' => [
            'driver' => 'daily',
            'path' => storage_path() . '/storage/logs/info.log',
            'level' => MonologLogger::INFO,
        ],
        'inbound' => [
            'driver' => 'daily',
            'path' => storage_path() . '/storage/logs/inbound.log',
            'level' => MonologLogger::INFO,
        ],
        'outbound' => [
            'driver' => 'daily',
            'path' => storage_path() . '/storage/logs/outbound.log',
            'level' => MonologLogger::INFO,
        ],
        'info' => [
            'driver' => 'daily',
            'path' => storage_path() . '/storage/logs/info.log',
            'level' => MonologLogger::INFO,
        ],
        'debug' => [
            'driver' => 'daily',
            'path' => storage_path() . '/storage/logs/debug.log',
            'level' => MonologLogger::DEBUG,
        ],
        'alert' => [
            'driver' => 'daily',
            'path' => storage_path() . '/storage/logs/alert.log',
            'level' => MonologLogger::ALERT,
        ],
        'error' => [
            'driver' => 'daily',
            'path' => storage_path() . '/storage/logs/error.log',
            'level' => MonologLogger::ERROR,
        ],
    ],
    'metadata' => [],
    'mask' => []
];
