<?php

namespace TakeTheLead\LaravelStoryblokFileProxy\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use TakeTheLead\LaravelStoryblokFileProxy\StoryblokUrl;

class StoryblokFileProxyController extends Controller
{
    protected Client $guzzleClient;

    public function __construct(Client $client)
    {
        $this->guzzleClient = $client;
    }

    public function __invoke(Request $request, StoryblokUrl $storyblokUrl, string $type, string $slug): Response
    {
        $fileUrl = $storyblokUrl->toStoryblok($type, $slug);

        try {
            $response = $this->guzzleClient->get($fileUrl);
        } catch (ClientException $exception) {
            abort($exception->getCode());
        }

        return response(
            $response->getBody()->getContents(),
            $response->getStatusCode(),
            ['Content-Type' => $response->getHeader('Content-Type')]
        );
    }
}
