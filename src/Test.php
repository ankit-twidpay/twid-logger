<?php

namespace twid\logger;

use twid\logger\Facades\LoggerFacade;

class Test
{
    public function test()
    {
        LoggerFacade::info('I am here',['ab']);
        LoggerFacade::warning('I am here warning', ['warning']);
        LoggerFacade::critical('I am here critical', ['critical']);
        LoggerFacade::error('I am here error', ['error']);
        LoggerFacade::alert('I am here alert', ['alert']);
        LoggerFacade::inbound('I am here inbound', ['inbound']);
        LoggerFacade::outbound('I am here outbound', ['outbound']);

        return 1;
    }
}
