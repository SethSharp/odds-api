<?php

namespace SethSharp\OddsApi\Traits\Endpoints;

use SethSharp\OddsApi\Traits\UseValidatesParams;

trait UseSports
{
    use UseValidatesParams;

    public function getSports($params = [])
    {
        $requiredParams = [
            'all'
        ];

        $this->validateParams($params, $requiredParams);

        return $this->decodeResponse($this->get('/sports', $params));
    }
}