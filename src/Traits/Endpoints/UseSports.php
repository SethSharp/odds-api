<?php

namespace SethSharp\OddsApi\Traits\Endpoints;

use SethSharp\OddsApi\Enums\SportsEnum;
use SethSharp\OddsApi\Traits\UseValidatesParams;

trait UseSports
{
    use UseValidatesParams;

    public function getSports($params = [])
    {
        $this->validateParams($params, []);

        return $this->decodeResponse($this->get('/sports', $params));
    }

    public function getScoresForSport(SportsEnum $sport)
    {
        return $this->decodeResponse($this->get("/sports/{$sport}/scores"));
    }
}