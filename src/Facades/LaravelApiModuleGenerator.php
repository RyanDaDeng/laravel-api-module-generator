<?php

namespace TimeHunter\LaravelApiModuleGenerator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void publish($schema)
 * Class LaravelApiModuleGenerator
 * @package TimeHunter\LaravelApiModuleGenerator\Facades
 * @see \TimeHunter\LaravelApiModuleGenerator\LaravelApiModuleGenerator
 */
class LaravelApiModuleGenerator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelapimodulegenerator';
    }
}
