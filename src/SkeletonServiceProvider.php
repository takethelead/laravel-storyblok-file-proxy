<?php

namespace TakeTheLead\Skeleton;

use Illuminate\Support\ServiceProvider;

class SkeletonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-storyblok-file-proxy.php' => config_path('laravel-storyblok-file-proxy.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-storyblok-file-proxy.php', 'laravel-storyblok-file-proxy');
    }
}
