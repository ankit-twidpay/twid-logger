<?php

namespace twid\logger;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger as MonologLogger;

class Logger
{
    protected $log;
    protected $config;
    protected $request;
    protected $channel;
    protected $metadata = [];

    public function __construct($channel = 'default')
    {
        $this->log = new MonologLogger($channel);
        $this->config = include(dirname(__DIR__, 4) . '/config/logging.php');
        $this->channel = $channel;

        $channelConfig = $this->config['channels'][$channel];

        if ($channelConfig) {
            $logPath = $channelConfig['path'];
            $logLevel = $channelConfig['level'];

            $handler = new RotatingFileHandler($logPath, 0, $logLevel);
            $handler->setFormatter(new JsonFormatter());

            $this->log->pushHandler($handler);
        }
    }
    public function log($message, $data = [])
    {
        $data = $this->maskFields($data);

        $data['metadata'] = $this->metadata();
        $this->maskFields($data);

        return $this->log->log($this->config['channels'][$this->channel]['level'], $message, $data);
    }

    protected function metadata()
    {
        $defaultLog = $this->config['metadata'];
        $request = $_REQUEST;

        foreach ($defaultLog as $data) {
            $this->metadata[$data] = $request[$data] ?? null;
        }

        return $this->maskFields($this->metadata);
    }
    protected function maskFields($data = [])
    {
        $fields = $this->config['mask'];

        foreach ($fields as $field) {
            if (isset($data[$field])) {
                $data[$field] = '********';
            }
        }

        return $data;
    }
}
