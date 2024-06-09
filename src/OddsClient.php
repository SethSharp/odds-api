<?php

namespace SethSharp\OddsApi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use SethSharp\OddsApi\Traits\UseHandleHeaders;
use SethSharp\OddsApi\Traits\Endpoints\UseOdds;
use SethSharp\OddsApi\Traits\Endpoints\UseSports;

class OddsClient
{
    use UseOdds;
    use UseSports;
    use UseHandleHeaders;

    private Client $client;
    private string $apiKey;
    private string $apiEndpoint = 'https://api.the-odds-api.com';

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

    public function getApiEndpoint(): string
    {
        return $this->apiEndpoint;
    }

    // todo: mocked endpoint tests
    protected function get($endpoint, $params = []): Response
    {
        $params['apiKey'] = $this->apiKey;

        try {
            return $this->client->get('/' . config('odds-api.version') . $endpoint, [
                'query' => $params
            ]);
        } catch (RequestException $e) {
            throw new \RuntimeException('Request failed: ' . $e->getMessage());
        }
    }

    protected function decodeResponse($response)
    {
        return json_decode($response->getBody(), true);
    }
}
