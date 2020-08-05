<?php

return [

    /*
    |--------------------------------------------------------------------------
    | File url
    |--------------------------------------------------------------------------
    |
    | Define the url to proxy files through.
    |
    | Ex. 'files' will result in https://appurl.test/files/{fileSlug}
    |
    */

    'base_url' => 'files',

    'proxy_urls' => [
        [
            'type' => 'images',
            'url' => 'https://img2.storyblok.com',
        ],
        [
            'type' => 'other',
            'url' => 'https://a.storyblok.com',
        ],
    ],

];
