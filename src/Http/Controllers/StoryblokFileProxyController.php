<?php

namespace TakeTheLead\LaravelStoryblokFileProxy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use TakeTheLead\LaravelStoryblokFileProxy\StoryblokUrl;
use Exception;

class StoryblokFileProxyController extends Controller
{
    public function __invoke(Request $request, StoryblokUrl $storyblokUrl, string $type, string $slug): Response
    {
        $fileUrl = $storyblokUrl->toStoryblok($type, $slug);

        try {
            $fileContents = file_get_contents($fileUrl);
        } catch (Exception $exception) {
            abort(404);
        }

        return response($fileContents, 200, ['Content-Type' => pathinfo($fileUrl, PATHINFO_EXTENSION)]);
    }
}
