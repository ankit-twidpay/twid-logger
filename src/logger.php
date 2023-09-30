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
        $this->config = include(__DIR__ . '/config/logging.php');
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

    public function info($message, $data = [])
    {
        $this->log($message, $data, $this->config['channels']['info']);
    }

    public function warning($message, $data = [])
    {
        $this->log($message, $data, $this->config['channels']['warning']);
    }

    public function critical($message, $data = [])
    {
        $this->log($message, $data, $this->config['channels']['critical']);
    }

    public function error($message, $data = [])
    {
        $this->log($message, $data, $this->config['channels']['error']);
    }
    public function alert($message, $data = [])
    {
        $this->log($message, $data, $this->config['channels']['alert']);
    }

    public function inbound($message, $data = [])
    {
        $this->log($message, $data, $this->config['channels']['inbound']);
    }

    public function outbound($message, $data = [])
    {
        $this->log($message, $data, $this->config['channels']['outbound']);
    }
    public function debug($message, $data = [])
    {
        if (getenv('APP_ENV') === 'production') {
            return false;
        }

        $this->log($message, $data, $this->config['channels']['debug']);
    }

    protected function log($message, $data = [], $channel = null)
    {
        $channelToUse = $channel ?? $this->channel;
        $data = $this->maskFields($data);

        $data['metadata'] = $this->metadata();
        $this->maskFields($data);

        $this->log->log($channelToUse['level'], $message, $data);
    }

    protected function metadata()
    {
        $defaultLog = $this->config['metadata'];
        $request = $_REQUEST;

        foreach ($defaultLog as $data) {
            $this->metadata = $request[$data] ?? null;
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
