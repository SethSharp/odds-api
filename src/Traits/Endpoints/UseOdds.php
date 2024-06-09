<?php

namespace SethSharp\OddsApi\Traits\Endpoints;

use SethSharp\OddsApi\Enums\SportsEnum;
use SethSharp\OddsApi\Traits\UseValidatesParams;

trait UseOdds
{
    use UseValidatesParams;

    public array $allowedParameters = [
        'regions' => '',
        'markets' => ''
    ];

    public function getOddsForSport(SportsEnum $sport, $region)
    {
        // todo: possibly a better way to define this per endpoint?
        // some endpoints have the same params (can we abstract each param away?
        if (is_array($region)) {
            $region = implode('', $region);
        }

        $params = [
            'regions' => $region
        ];


        $this->validateParams($params, $this->allowedParameters);

        return $this->decodeResponse($this->get("/sports/$sport->value/odds", $params));
    }
}