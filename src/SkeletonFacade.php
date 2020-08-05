<?php

namespace TakeTheLead\Skeleton;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TakeTheLead\Skeleton\Skeleton
 */
class SkeletonFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'skeleton';
    }
}
