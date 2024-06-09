<?php

namespace SethSharp\OddsApi\Traits;

trait UseValidatesParams
{
    protected function validateParams(array $params, array $allowedParams): void
    {
        foreach ($params as $key => $value) {
            if (!array_key_exists($key, $allowedParams)) {
                throw new \InvalidArgumentException("Invalid parameter: $key");
            }

            // validates param
            if (! $this->{$key}($value)) {
                throw new \InvalidArgumentException("Invalid type for parameter: $key. Expected {$allowedParams[$key]}.");
            }
        }
    }

    private function regions($regions): bool
    {
        // todo: add all valid markets, add into a config or enum?...

        // todo: handle array and single value
        return in_array($regions, ['au', 'us', 'uk']);
    }

    private function markets($markets)
    {

    }
}