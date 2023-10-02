<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base url
    |--------------------------------------------------------------------------
    |
    | Define the base url to proxy files through.
    |
    | Ex. 'files' will result in https://appurl.test/files/{fileSlug}
    |
    */

    'base_url' => 'files',

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | Define the route middleware (groups) where the proxy route should be
    | wrapped in.
    |
    |
    */

    'middleware' => [
        'web',
    ],

    /*
    |--------------------------------------------------------------------------
    | Proxy urls
    |--------------------------------------------------------------------------
    |
    | Define all url types that should be formatted. Each proxy should
    | have at least a "type" and "url" property. The defined base url
    | will be swapped with a local url.
    |
    */

    'proxy_urls' => [
        [
            'type' => 'images',
            'url' => 'https://en.wikipedia.org/wiki/.google#/media/File:Google_2015_logo.svg',
        ],
        [
            'type' => 'other',
            'url' => 'https://en.wikipedia.org/wiki/.google#/media/File:Google_2015_logo.svg',
        ],
    ],

];
