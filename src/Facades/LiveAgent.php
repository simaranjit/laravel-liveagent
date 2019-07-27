<?php

namespace MacsiDigital\LiveAgent\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Macsidigital\LiveAgentLaravel\Skeleton\SkeletonClass
 */
class LiveAgent extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'liveagent';
    }
}
