<?php

namespace SethSharp\OddsApi\Traits\Endpoints;

use SethSharp\OddsApi\Traits\UseValidatesParams;

trait UseSports
{
    use UseValidatesParams;

    public function getSports($params = [])
    {
        // todo: possibly a better way to define this per endpoint?
        // some endpoints have the same params (can we abstract each param away?
        $allowedParams = [
            'all' => 'boolean'
        ];

        $this->validateParams($params, $allowedParams);

        return $this->decodeResponse($this->get('/sports', $params));
    }
}