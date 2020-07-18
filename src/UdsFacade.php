<?php

namespace Altynbek07\Uds;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Altynbek07\Uds\Uds
 */
class UdsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'uds';
    }
}
