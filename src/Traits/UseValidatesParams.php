<?php

namespace SethSharp\OddsApi\Traits;

trait UseValidatesParams
{
    protected function validateParams(array $params, array $requiredParams): void
    {
        foreach ($requiredParams as $param) {
            if (!array_key_exists($param, $params)) {
                throw new \InvalidArgumentException("Missing required parameter: $param");
            }

            // todo: Eventually validate some params before hitting api
        }
    }
}