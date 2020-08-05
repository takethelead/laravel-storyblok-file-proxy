<?php

namespace TakeTheLead\LaravelStoryblokFileProxy;

use TakeTheLead\LaravelStoryblokFileProxy\Exceptions\ProxySettingsNotFoundException;

class StoryblokUrl
{
    public function toLocal(string $url): string
    {
        $proxySettings = $this->getProxySettings($url);

        $slug = collect(explode($proxySettings['url'], $url))->last();

        return route('storyblok.fileProxy', [
            $proxySettings['type'],
            trim($slug, '/'),
        ]);
    }

    public function toStoryblok(string $type, string $slug)
    {
        $proxySettings = collect(config('laravel-storyblok-file-proxy.proxy_urls'))
            ->first(function (array $proxyUrl) use ($type) {
                return $proxyUrl['type'] === $type;
            });

        if (is_null($proxySettings)) {
            throw new \Exception('unkown proxy type');
        }

        return $proxySettings['url'] . '/' . $slug;
    }

    protected function getProxySettings(string $url): array
    {
        $proxySettings = collect(config('laravel-storyblok-file-proxy.proxy_urls'))
            ->first(function (array $proxyUrl) use ($url) {
                return strpos($url, $proxyUrl['url']) === 0;
            });

        if (is_null($proxySettings)) {
            throw new ProxySettingsNotFoundException("No proxy settings found for $url");
        }

        return $proxySettings;
    }
}
