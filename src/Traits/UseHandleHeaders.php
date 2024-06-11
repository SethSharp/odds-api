<?php

namespace SethSharp\OddsApi\Traits;

use SethSharp\OddsApi\Enums\HeadersEnum;

trait UseHandleHeaders
{
    protected $requestsUsed;
    protected $requestsRemaining;

    public function getRequestsRemaining(): string
    {
        if ($this->requestsRemaining) return $this->requestsRemaining;

        // sports endpoint does not cost quota
        $response =  $this->get('/sports');
        $header = $response->getHeader(HeadersEnum::REQUESTS_REMAINING_HEADER);

        $value =  $header[0] ?? null;

        if (is_null($value)) {
            return 'Failed to fetch remaining requests.';
        }

        $this->requestsRemaining = $value;

        return $this->requestsRemaining;
    }

    public function getRequestsUsed(): string
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
}