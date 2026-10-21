<?php
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class FeedTest extends TestCase
{
    public function test_two_home_visits_share_cached_feed(): void
    {
        Http::preventStrayRequests();Cache::forget('coffeedevs.blog.rss');
        Http::fake(['blog.coffeedevs.com/*'=>Http::response('<?xml version="1.0"?><rss version="2.0"><channel><title>Blog</title><link>https://example.test</link><description>Feed</description><item><title>Parity blog post</title><link>https://example.test/post</link><description>Summary</description><pubDate>Wed, 21 Oct 2026 10:00:00 GMT</pubDate></item></channel></rss>')]);
        $this->get('/')->assertOk()->assertSee('Parity blog post');$this->get('/')->assertOk()->assertSee('Parity blog post');
        Http::assertSentCount(1);
    }
    public function test_failed_empty_and_unavailable_feed_leave_home_working_without_poisoning_cache(): void
    {
        Http::preventStrayRequests();
        foreach([Http::response('error',500),Http::response(''),Http::failedConnection()] as $reply) {
            Cache::forget('coffeedevs.blog.rss');Http::fake(['blog.coffeedevs.com/*'=>$reply]);
            $this->get('/')->assertOk();$this->assertFalse(Cache::has('coffeedevs.blog.rss'));
        }
    }
}
