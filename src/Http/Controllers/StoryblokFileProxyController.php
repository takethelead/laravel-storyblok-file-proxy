<?php

namespace TakeTheLead\LaravelStoryblokFileProxy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use TakeTheLead\LaravelStoryblokFileProxy\StoryblokUrlFacade;

class StoryblokFileProxyController extends Controller
{
    public function __invoke(Request $request, string $type, string $slug)
    {
        $file = StoryblokUrlFacade::toStoryblok($type, $slug);

        $type = pathinfo($file, PATHINFO_EXTENSION);
        header('Content-Type:'.$type);
        echo file_get_contents($file);
    }
}
