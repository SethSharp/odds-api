<?php

namespace SethSharp\OddsApi\Traits;

trait UseValidatesParams
{
    // todo: Have some sort of array which defines validation per type of param?..
    // sport - must be in SportsEnum...
    // Things like this to avoid API errors rather a elegant way...

    protected function validateParams(array $params, array $allowedParams): void
    {
        foreach ($params as $key => $value) {
            if (!array_key_exists($key, $allowedParams)) {
                throw new \InvalidArgumentException("Invalid parameter: $key");
            }

            if (gettype($value) !== $allowedParams[$key]) {
                throw new \InvalidArgumentException("Invalid type for parameter: $key. Expected {$allowedParams[$key]}.");
            }
        }
    }
}