<?php

namespace TakeTheLead\LaravelStoryblokFileProxy\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class StoryblokFileProxyTest extends TestCase
{
    /** @test */
    public function it_can_proxy_files()
    {
        $this->mockGuzzleResponse([new Response(200, ['Content-Type' => 'image/jpeg'], '')]);

        $this->get(route('storyblok.fileProxy', ['images', 'some-file.jpg']))
            ->assertSuccessful()
            ->assertHeader('Content-Type', 'image/jpeg');
    }

    /** @test */
    public function it_can_not_proxy_unexisting_files()
    {
        $this->mockGuzzleResponse([new Response(404, ['Content-Type' => 'text/html'], '')]);

        $this->get(route('storyblok.fileProxy', ['images', 'some-file.jpg']))
            ->assertNotFound()
            ->assertHeader('Content-Type', 'text/html; charset=UTF-8');
    }

    /** @test */
    public function it_can_not_proxy_files_of_unkown_types()
    {
        $this->get(route('storyblok.fileProxy', ['unkownType', 'some-file.jpg']))
            ->assertNotFound();
    }

    private function mockGuzzleResponse(array $mockHandlers)
    {
        $mockHandler = new MockHandler($mockHandlers);

        $clientMock = new Client(['handler' => HandlerStack::create($mockHandler)]);

        $this->swap(Client::class, $clientMock);
    }
}
