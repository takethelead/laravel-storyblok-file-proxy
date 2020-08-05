<?php

namespace TakeTheLead\LaravelStoryblokFileProxy;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TakeTheLead\LaravelStoryblokFileProxy\StoryblokUrl
 */
class StoryblokUrlFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'storyblokUrl';
    }
}
