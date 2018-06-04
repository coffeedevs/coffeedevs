<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Project;
use App\Type;
use willvincent\Feeds\Facades\FeedsFacade;

class HomeController extends Controller
{
    function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        $types = Type::all();

        $feed = FeedsFacade::make('https://blog.coffeedevs.com/rss');
        $blogPosts = collect($feed->get_items())->take(3);

        return view('web.index', compact('projects', 'types', 'blogPosts'));
    }

    public function services()
    {
        return view('web.services');
    }

    public function locale($locale)
    {
        session(['locale' => $locale]);

        return back();
    }
}
