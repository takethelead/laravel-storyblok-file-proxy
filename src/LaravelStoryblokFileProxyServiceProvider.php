<?php

namespace TakeTheLead\LaravelStoryblokFileProxy;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class LaravelStoryblokFileProxyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-storyblok-file-proxy.php' => config_path('laravel-storyblok-file-proxy.php'),
            ], 'config');
        }

        $this->loadRoutesFrom(__DIR__ . '/../routes/laravel-storyblok-file-proxy.php');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-storyblok-file-proxy.php', 'laravel-storyblok-file-proxy');

        $this->app->bind('storyblokUrl', function () {
            return new StoryblokUrl();
        });

        $this->app->bind(Client::class, function () {
            return new Client();
        });
    }
}
