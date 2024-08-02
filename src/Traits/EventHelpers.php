<?php

namespace SethSharp\OddsApi\Traits;

trait EventHelpers
{
    protected function buildEvents(array $eventIds): string
    {
        return implode(',', $eventIds);
    }
}
