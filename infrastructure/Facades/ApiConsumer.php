<?php 

namespace Infrastructure\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Optimus\ApiConsumer\Router
 */
class ApiConsumer extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'apiconsumer';
    }
}
