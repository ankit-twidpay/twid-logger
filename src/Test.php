<?php

namespace twid\logger;

use twid\logger\Facades\LoggerFacade;

class Test
{
    public function test()
    {
        LoggerFacade::info('I am here', ['mobile_number' => '8005086428', 'custom_field' => 'abc']);
        LoggerFacade::warning('I am here warning', ['warning', 'mobile_number' => '8005086428']);
        LoggerFacade::critical('I am here critical', ['critical']);
        LoggerFacade::error('I am here error', ['error']);
        LoggerFacade::alert('I am here alert', ['alert']);
        LoggerFacade::inbound('I am here inbound', ['inbound']);
        LoggerFacade::outbound('I am here outbound', ['outbound']);
        LoggerFacade::debug('I am here error', ['debug']);


        return 1;
    }
}
