<?php

namespace twid\logger;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger as MonologLogger;

class Logger
{
    protected $log;
    protected $config;

    public function __construct($channel = 'default')
    {
        $this->log = new MonologLogger($channel);
        $this->config = include(__DIR__ . '/config/logging.php'); // Assuming you have a config.php file
        $this->channel = $channel;

        $channelConfig = $this->config['channels'][$channel];

        if ($channelConfig) {
            $logPath = $channelConfig['path'];
            $logLevel = $channelConfig['level'];

            // Create a StreamHandler with a JSON formatter
            // $handler = new StreamHandler($logPath, $logLevel);

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

    protected function log($message, $data = [], $channel = null)
    {
        $channelToUse = $channel ?? $this->channel;
        $this->log->log($channelToUse['level'], $message, $data);
    }
    protected function maskFields($data)
    {
        // Get the fields to mask from the application's configuration
        $fields = config('your_application.masked_fields'); // Adjust the config path accordingly

        // Mask the specified fields in the $data array
        foreach ($fields as $field) {
            if (isset($data[$field])) {
                // Mask the field's value, e.g., replace it with "********"
                $data[$field] = '********';
            }
        }

        return $data;
    }
}
