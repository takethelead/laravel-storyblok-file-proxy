<?php

namespace TakeTheLead\LaravelStoryblokFileProxy\Tests;

use TakeTheLead\LaravelStoryblokFileProxy\Exceptions\ProxySettingsNotFoundException;
use TakeTheLead\LaravelStoryblokFileProxy\StoryblokUrlFacade;

class StoryblokUrlTest extends TestCase
{
    /** @test */
    public function it_can_convert_storyblok_urls_to_local_urls()
    {
        $urls = [
            'https://a.storyblok.com/f/86478/4643x3095/abd123d456/some-image.jpg' => 'http://localhost/files/other/f/86478/4643x3095/abd123d456/some-image.jpg',
            'https://img2.storyblok.com/f/86478/4643x3095/abd123d456/some-image.jpg' => 'http://localhost/files/images/f/86478/4643x3095/abd123d456/some-image.jpg',
        ];

        foreach ($urls as $storyblokUrl => $localUrl) {
            $this->assertEquals($localUrl, StoryblokUrlFacade::toLocal($storyblokUrl));
        }
    }

    /** @test */
    public function it_can_not_convert_urls_not_known_by_the_proxy_to_local_urls()
    {
        $this->expectException(ProxySettingsNotFoundException::class);

        StoryblokUrlFacade::toLocal('https://takethelead.be/images/some-image.jpg');
    }

    /** @test */
    public function it_can_convert_slugs_to_storyblok_urls()
    {
        $urlPaths = [
            [
                'slug' => 'f/86478/4643x3095/abd123d456/some-image.jpg',
                'type' => 'other',
                'expectedUrl' => 'https://a.storyblok.com/f/86478/4643x3095/abd123d456/some-image.jpg',
            ],
            [
                'slug' => 'f/86478/4643x3095/abd123d456/some-image.jpg',
                'type' => 'images',
                'expectedUrl' => 'https://img2.storyblok.com/f/86478/4643x3095/abd123d456/some-image.jpg',
            ],
        ];

        foreach ($urlPaths as $urlPath) {
            $this->assertEquals(
                $urlPath['expectedUrl'],
                StoryblokUrlFacade::toStoryblok($urlPath['type'], $urlPath['slug'])
            );
        }
    }

    /** @test */
    public function it_can_not_convert_slugs_of_unkown_types_to_storyblok_urls()
    {
        $this->expectException(ProxySettingsNotFoundException::class);

        StoryblokUrlFacade::toStoryblok('nonExistingType', 'f/86478/4643x3095/abd123d456/some-image.jpg');
    }
}
