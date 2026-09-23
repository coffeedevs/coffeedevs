<?php

use App\Services\Turnstile;
use GuzzleHttp\Client;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Mail;

class ContactTest extends TestCase
{
    use WithoutMiddleware;

    protected $form = [
        'asunto'   => 'Hola',
        'nombre'   => 'Test',
        'email'    => 'test@example.com',
        'consulta' => 'Mensaje',
    ];

    protected $turnstile;

    protected $mailer;

    public function setUp()
    {
        parent::setUp();

        $this->turnstile = new class extends Turnstile {
            public $result = true;
            public $calls = 0;

            public function __construct()
            {
                parent::__construct(new Client(), 'secret');
            }

            public function verify($token, $ip = null, $action = null)
            {
                $this->calls++;

                return $this->result;
            }
        };
        $this->app->instance(Turnstile::class, $this->turnstile);

        $this->mailer = new class {
            public $sent = 0;

            public function send($view, array $data = [], $callback = null)
            {
                $this->sent++;
            }
        };
        Mail::swap($this->mailer);
    }

    public function test_a_filled_honeypot_fakes_success_without_verifying_or_sending()
    {
        $this->json('POST', '/contact', $this->form + ['website' => 'http://spam.example'])
            ->assertStatus(200)
            ->assertJson(['sendstatus' => 1]);

        $this->assertSame(0, $this->turnstile->calls);
        $this->assertSame(0, $this->mailer->sent);
    }

    public function test_a_valid_token_sends_the_mail()
    {
        $this->json('POST', '/contact', $this->form + ['cf-turnstile-response' => 'token'])
            ->assertStatus(200)
            ->assertJson(['sendstatus' => 1]);

        $this->assertSame(1, $this->turnstile->calls);
        $this->assertSame(1, $this->mailer->sent);
    }

    public function test_an_invalid_token_is_rejected_without_sending()
    {
        $this->turnstile->result = false;

        $this->json('POST', '/contact', $this->form + ['cf-turnstile-response' => 'token'])
            ->assertStatus(422)
            ->assertJsonStructure(['cf-turnstile-response']);

        $this->assertSame(0, $this->mailer->sent);
    }

    public function test_a_missing_token_is_rejected_without_sending()
    {
        $this->json('POST', '/contact', $this->form)
            ->assertStatus(422)
            ->assertJsonStructure(['cf-turnstile-response']);

        $this->assertSame(0, $this->turnstile->calls);
        $this->assertSame(0, $this->mailer->sent);
    }
}
