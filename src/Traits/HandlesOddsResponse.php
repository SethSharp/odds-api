<?php

namespace SethSharp\OddsApi\Traits;

use GuzzleHttp\Psr7\Response;

trait HandlesOddsResponse
{
    protected function extractJsonFromResponse(Response $response): mixed
    {
        return json_decode($response->getBody(), true);
    }
}