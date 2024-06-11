<?php

namespace SethSharp\OddsApi\Traits\Endpoints;

use SethSharp\OddsApi\Traits\UseValidatesParams;

trait UseSports
{
    use UseValidatesParams;

    public function getSports($params = [])
    {
        $this->validateParams($params, []);

        return $this->decodeResponse($this->get('/sports', $params));
    }
}