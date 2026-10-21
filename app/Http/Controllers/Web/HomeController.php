<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Project;
use App\Type;
use SimplePie\SimplePie;

class HomeController extends Controller
{
    function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        $types = Type::all();

        try {
            $feed = new SimplePie();
            $fetch = function () {
                $xml = \Illuminate\Support\Facades\Http::timeout(5)->get('https://blog.coffeedevs.com/rss')->throw()->body();
                $candidate = new SimplePie();
                $candidate->enable_cache(false);
                $candidate->set_raw_data($xml);
                if ($xml === '' || !@$candidate->init()) {
                    throw new \RuntimeException('Blog RSS is invalid');
                }
                return $xml;
            };
            $feedConfig = config('feeds');
            $xml = ($feedConfig['cache.disabled'] ?? false) ? $fetch() : \Illuminate\Support\Facades\Cache::remember(
                'coffeedevs.blog.rss', $feedConfig['cache.life'] ?? 3600, $fetch);
            $feed->set_raw_data($xml);
            $feed->enable_cache(false);
            $feed->init();
            $blogPosts = collect($feed->get_items())->take(3);
        } catch (\Throwable $e) {
            $blogPosts = collect();
        }

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
