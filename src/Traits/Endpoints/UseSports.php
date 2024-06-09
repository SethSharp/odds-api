<?php

namespace SethSharp\OddsApi\Traits\Endpoints;

use SethSharp\OddsApi\Traits\UseValidatesParams;

trait UseSports
{
    use UseValidatesParams;

    private array $allowedParameters = [
        'all'
    ];

    public function getSports($params = [])
    {
        $this->validateParams($params, $this->allowedParameters);

        return $this->decodeResponse($this->get('/sports', $params));
    }
}