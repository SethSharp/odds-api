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

            $validationMethod = 'validate' . ucfirst($param);
            if (method_exists($this, $validationMethod)) {
                $this->$validationMethod($params[$param]);
            }
        }
    }

    protected function validateRegions(array $regions)
    {
        $allowedRegions = ['au', 'us', 'uk', 'us2', 'eu'];
        foreach ($regions as $region) {
            if (!in_array($region, $allowedRegions)) {
                throw new \InvalidArgumentException("Invalid region: $region");
            }
        }
    }
}