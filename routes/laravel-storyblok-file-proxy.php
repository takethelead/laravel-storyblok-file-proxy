<?php

use Illuminate\Support\Facades\Route;
use TakeTheLead\LaravelStoryblokFileProxy\Http\Controllers\StoryblokFileProxyController;

Route::get(config('laravel-storyblok-file-proxy.base_url') . '/{type}/{slug}', StoryblokFileProxyController::class)
    ->where('type', collect(config('laravel-storyblok-file-proxy.proxy_urls'))->map->type->implode('|'))
    ->where('slug', '.*')
    ->name('storyblok.fileProxy');
