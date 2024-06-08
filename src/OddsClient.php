<?php

namespace SethSharp\OddsApi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use SethSharp\OddsApi\Enums\HeadersEnum;
use GuzzleHttp\Exception\RequestException;

class OddsClient
{
    private $client;
    private $apiKey;
    private $apiEndpoint = 'https://api.the-odds-api.com/v4';

    protected $requestsUsed = null;
    protected $requestsRemaining  = null;

    public function __construct(string $apiKey, $apiEndpoint = null)
    {
        $this->apiKey = $apiKey;

        if ($apiEndpoint) {
            $this->apiEndpoint = $apiEndpoint;
        }

        $this->client = new Client([
            'base_uri' => $this->apiEndpoint,
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    protected function getApiEndpoint(): string
    {
        return $this->apiEndpoint;
    }

    // todo: mocked endpoint tests
    protected function get($endpoint, $params = []): Response
    {
        $params['apiKey'] = $this->apiKey;

        try {
            return $this->client->get($endpoint, [
                'query' => $params
            ]);
        } catch (RequestException $e) {
            throw new \RuntimeException('Request failed: ' . $e->getMessage());
        }
    }

    protected function getRequestsRemaining(): string
    {
        if ($this->requestsRemaining) return $this->requestsRemaining;

        // sports endpoint does not cost quota
        $response =  $this->get('/sports');
        $header = $response->getHeader(HeadersEnum::REQUESTS_REMAINING_HEADER);

        // todo: verify this
        $value =  $header[0] ?? null;

        if (is_null($value)) {
            return 'Failed to fetch remaining requests.';
        }

        $this->requestsRemaining = $value;

        return $this->requestsRemaining;
    }

    protected function getRequestsUsed(): string
    {
        if ($this->requestsUsed) return $this->requestsUsed;

        // sports endpoint does not cost quota
        $response =  $this->get('/sports');
        $header = $response->getHeader(HeadersEnum::REQUESTS_USED);

        // todo: verify this
        $value =  $header[0] ?? null;

        if (is_null($value)) {
            return 'Failed to fetch requests used.';
        }

        $this->requestsUsed = $value;

        return $this->requestsUsed;
    }

    protected function decodeResponse($response)
    {
        return json_decode($response->getBody(), true);
    }

    // todo: write tests for this function
    protected function validateParams(array $params, array $allowedParams): void
    {
        foreach ($params as $key => $value) {
            if (!array_key_exists($key, $allowedParams)) {
                throw new \InvalidArgumentException("Invalid parameter: $key");
            }

            if (gettype($value) !== $allowedParams[$key]) {
                throw new \InvalidArgumentException("Invalid type for parameter: $key. Expected {$allowedParams[$key]}.");
            }
        }
    }

    public function getSports($params = [])
    {
        // todo: possibly a better way to define this per endpoint?
        // some endpoints have the same params (can we abstract each param away?
        $allowedParams = [
            'all' => 'boolean'
        ];

        $this->validateParams($params, $allowedParams);

        return $this->decodeResponse($this->get('/sports'), $params);
    }
}