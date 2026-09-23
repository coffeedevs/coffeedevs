<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class Turnstile
{
    const VERIFY_URL = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

    protected $client;

    protected $secret;

    protected $hostnames;

    protected $allowTestingKeys;

    public function __construct(Client $client, $secret, array $hostnames = [], $allowTestingKeys = false)
    {
        $this->client = $client;
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

        if (empty($result['success'])) {
            return false;
        }

        if (!empty($result['metadata']['result_with_testing_key'])) {
            return $this->allowTestingKeys;
        }

        if ($action !== null && (!isset($result['action']) || $result['action'] !== $action)) {
            return false;
        }

        return !$this->hostnames || (isset($result['hostname']) && in_array($result['hostname'], $this->hostnames, true));
    }
}
