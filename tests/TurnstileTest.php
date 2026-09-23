<?php

use App\Services\Turnstile;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;

class TurnstileTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        require_once database_path('migrations/2026_09_23_000000_create_turnstile_tokens_table.php');
        (new CreateTurnstileTokensTable())->up();
    }

    public function test_it_accepts_a_successful_response_with_the_expected_action()
    {
        $this->assertTrue($this->turnstile(['success' => true, 'action' => 'contact'])->verify('token', null, 'contact'));
    }

    public function test_it_accepts_an_allowed_hostname()
    {
        $response = ['success' => true, 'action' => 'contact', 'hostname' => 'www.coffeedevs.com'];

        $this->assertTrue($this->turnstile($response, 'secret', ['coffeedevs.com', 'www.coffeedevs.com'])->verify('token', null, 'contact'));
    }

    public function test_it_rejects_another_hostname()
    {
        $response = ['success' => true, 'action' => 'contact', 'hostname' => 'evil.example'];

        $this->assertFalse($this->turnstile($response, 'secret', ['coffeedevs.com'])->verify('token', null, 'contact'));
    }

    public function test_it_rejects_a_missing_hostname_when_hostnames_are_configured()
    {
        $this->assertFalse($this->turnstile(['success' => true, 'action' => 'contact'], 'secret', ['coffeedevs.com'])->verify('token', null, 'contact'));
    }

    public function test_it_rejects_a_replayed_token_even_if_siteverify_accepts_it()
    {
        $turnstile = $this->turnstile(['success' => true, 'action' => 'contact', 'hostname' => 'coffeedevs.com'], 'secret', ['coffeedevs.com']);

        $this->assertTrue($turnstile->verify('token', null, 'contact'));
        $this->assertFalse($turnstile->verify('token', null, 'contact'));
    }

    public function test_a_replayed_token_is_rejected_across_instances()
    {
        $response = ['success' => true, 'action' => 'contact', 'hostname' => 'coffeedevs.com'];

        $this->assertTrue($this->turnstile($response, 'secret', ['coffeedevs.com'])->verify('token', null, 'contact'));
        $this->assertFalse($this->turnstile($response, 'secret', ['coffeedevs.com'])->verify('token', null, 'contact'));
    }

    public function test_used_tokens_older_than_the_ttl_are_pruned()
    {
        DB::table('turnstile_tokens')->insert(['hash' => str_repeat('a', 64), 'created_at' => Carbon\Carbon::now()->subHours(2)]);

        $this->turnstile(['success' => true, 'action' => 'contact', 'hostname' => 'coffeedevs.com'], 'secret', ['coffeedevs.com'])->verify('token', null, 'contact');

        $this->assertSame(1, DB::table('turnstile_tokens')->count());
    }

    public function test_it_rejects_a_successful_response_with_another_action()
    {
        $this->assertFalse($this->turnstile(['success' => true, 'action' => 'login'])->verify('token', null, 'contact'));
    }

    public function test_it_rejects_a_successful_response_without_action()
    {
        $this->assertFalse($this->turnstile(['success' => true])->verify('token', null, 'contact'));
    }

    public function test_it_skips_the_action_and_hostname_checks_for_allowed_testing_keys()
    {
        $response = ['success' => true, 'hostname' => 'example.com', 'metadata' => ['result_with_testing_key' => true]];

        $this->assertTrue($this->turnstile($response, 'secret', ['coffeedevs.com'], true)->verify('token', null, 'contact'));
    }

    public function test_it_rejects_testing_keys_unless_allowed()
    {
        $response = ['success' => true, 'action' => 'contact', 'hostname' => 'coffeedevs.com', 'metadata' => ['result_with_testing_key' => true]];

        $this->assertFalse($this->turnstile($response, 'secret', ['coffeedevs.com'])->verify('token', null, 'contact'));
    }

    public function test_it_rejects_a_failed_response()
    {
        $this->assertFalse($this->turnstile(['success' => false, 'action' => 'contact'])->verify('token', null, 'contact'));
    }

    public function test_it_rejects_when_siteverify_is_unreachable()
    {
        $mock = new MockHandler([new ConnectException('timeout', new Request('POST', Turnstile::VERIFY_URL))]);
        $turnstile = new Turnstile(new Client(['handler' => HandlerStack::create($mock)]), DB::connection(), 'secret');

        $this->assertFalse($turnstile->verify('token', null, 'contact'));
    }

    public function test_it_rejects_without_secret_or_token()
    {
        $this->assertFalse($this->turnstile(['success' => true], null)->verify('token'));
        $this->assertFalse($this->turnstile(['success' => true])->verify(''));
        $this->assertFalse($this->turnstile(['success' => true])->verify(['token']));
    }

    protected function turnstile(array $response, $secret = 'secret', array $hostnames = [], $allowTestingKeys = false)
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode($response)),
            new Response(200, [], json_encode($response)),
        ]);

        return new Turnstile(
            new Client(['handler' => HandlerStack::create($mock)]),
            DB::connection(),
            $secret,
            $hostnames,
            $allowTestingKeys
        );
    }
}
