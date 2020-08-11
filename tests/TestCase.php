<?php

namespace TakeTheLead\LaravelStoryblokFileProxy\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use TakeTheLead\LaravelStoryblokFileProxy\LaravelStoryblokFileProxyServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelStoryblokFileProxyServiceProvider::class,
        ];
    }
}
