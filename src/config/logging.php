<?php

use Monolog\Logger as MonologLogger;

return [
    'channels' => [
        'default' => [
            'driver' => 'daily',
            'path' => 'storage/logs/info.log',
            'level' => MonologLogger::INFO,
        ],
        'inbound' => [
            'driver' => 'daily',
            'path' => 'storage/logs/inbound.log',
            'level' => MonologLogger::INFO,
        ],
        'outbound' => [
            'driver' => 'daily',
            'path' => 'storage/logs/outbound.log',
            'level' => MonologLogger::INFO,
        ],
        'info' => [
            'driver' => 'daily',
            'path' => 'storage/logs/info.log',
            'level' => MonologLogger::INFO,
        ],
        'critical' => [
            'driver' => 'daily',
            'path' => 'storage/logs/critical.log',
            'level' => MonologLogger::CRITICAL,
        ],
        'warning' => [
            'driver' => 'daily',
            'path' => 'storage/logs/warning.log',
            'level' => MonologLogger::WARNING,
        ],
        'debug' => [
            'driver' => 'daily',
            'path' => 'storage/logs/debug.log',
            'level' => MonologLogger::DEBUG,
        ],
        'alert' => [
            'driver' => 'daily',
            'path' => 'storage/logs/alert.log',
            'level' => MonologLogger::ALERT,
        ],
        'error' => [
            'driver' => 'daily',
            'path' => 'storage/logs/error.log',
            'level' => MonologLogger::ERROR,
        ],
    ],
    'metadata' => [
        'method_name',
        'line_no',
        'api_request_timestamp',
        'timestamp',
        'uri',
        'brand_id',
        'global_log_uuid',
        'api_execution_time',
        'customer_hash',
        'mobile',
        'brand_id',
        'request',
        'response',
        'exception_message',
        'exception_line',
        'exception_trace',
        'ip_address',
        'user_agent',
    ],
    'mask' => [
        'mobile_number',
    ]
];

