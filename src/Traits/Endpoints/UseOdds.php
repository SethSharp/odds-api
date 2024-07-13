<?php

namespace SethSharp\OddsApi\Traits\Endpoints;

use SethSharp\OddsApi\Enums\SportsEnum;
use SethSharp\OddsApi\Traits\UseValidatesParams;

trait UseOdds
{
    use UseValidatesParams;

    public function getOddsForSport(SportsEnum $sport, $params = [])
    {
        $this->validateParams($params, requiredParams: ['regions']);

        return $this->decodeResponse($this->get("/sports/$sport->value/odds", $params));
    }

    public function getOddsForEvent(SportsEnum $sport, string $event, $params)
    {
        $this->validateParams($params, requiredParams: ['regions']);

        return $this->decodeResponse($this->get("/sports/{$sport->value}/events/{$event}/odds"));
    }
}