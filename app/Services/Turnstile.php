<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Carbon\Carbon;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class Turnstile
{
    const VERIFY_URL = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

    const USED_TOKEN_TTL_MINUTES = 60;

    protected $client;

    protected $db;

    protected $secret;

    protected $hostnames;

    protected $allowTestingKeys;

    public function __construct(Client $client, ConnectionInterface $db, $secret, array $hostnames = [], $allowTestingKeys = false)
    {
        $this->client = $client;
        $this->db = $db;
        $this->secret = $secret;
        $this->hostnames = $hostnames;
        $this->allowTestingKeys = $allowTestingKeys;
    }

    public function verify($token, $ip = null, $action = null)
    {
        if (!$this->secret || !is_string($token) || $token === '' || strlen($token) > 2048) {
            return false;
        }

        try {
            $response = $this->client->post(self::VERIFY_URL, [
                'form_params' => array_filter([
                    'secret'   => $this->secret,
                    'response' => $token,
                    'remoteip' => $ip,
                ]),
                'timeout' => 5,
            ]);
        } catch (GuzzleException $e) {
            Log::warning('Turnstile siteverify request failed: ' . $e->getMessage());

            return false;
        }

        $result = json_decode((string) $response->getBody(), true);

        Log::info('Turnstile siteverify', ['token' => substr(hash('sha256', $token), 0, 12)] + array_intersect_key((array) $result, array_flip([
            'success', 'error-codes', 'hostname', 'action', 'challenge_ts', 'metadata',
        ])));

        if (empty($result['success'])) {
            return false;
        }

        if (!empty($result['metadata']['result_with_testing_key'])) {
            return $this->allowTestingKeys;
        }

        if ($action !== null && (!isset($result['action']) || $result['action'] !== $action)) {
            return false;
        }

        if ($this->hostnames && (!isset($result['hostname']) || !in_array($result['hostname'], $this->hostnames, true))) {
            return false;
        }

        return $this->claim($token);
    }

    protected function claim($token)
    {
        $tokens = $this->db->table('turnstile_tokens');

        try {
            $tokens->where('created_at', '<', Carbon::now()->subMinutes(self::USED_TOKEN_TTL_MINUTES))->delete();
            $this->db->table('turnstile_tokens')->insert([
                'hash'       => hash('sha256', $token),
                'created_at' => Carbon::now(),
            ]);
        } catch (QueryException $e) {
            Log::warning('Turnstile token rejected as already used: ' . $e->getMessage());

            return false;
        }

        return true;
    }
}
