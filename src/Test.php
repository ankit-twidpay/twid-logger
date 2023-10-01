<?php

namespace twid\logger;

use twid\logger\Facades\LoggerFacade;
use twid\logger\Facades\TLog;

class Test
{
    public function test()
    {
        TLog::info('I am here', ['mobile_number' => '8005086428', 'custom_field' => 'abc']);
        TLog::warning('I am here warning', ['warning', 'mobile_number' => '8005086428']);
        TLog::critical('I am here critical', ['critical']);
        TLog::error('I am here error', ['error']);
        TLog::alert('I am here alert', ['alert']);
        TLog::inbound('I am here inbound', ['inbound']);
        TLog::outbound('I am here outbound', ['outbound']);
        TLog::debug('I am here error', ['debug']);

        return 1;
    }
}
