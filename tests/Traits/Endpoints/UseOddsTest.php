<?php

namespace Traits\Endpoints;

use PHPUnit\Framework\TestCase;
use SethSharp\OddsApi\OddsClient;
use SethSharp\OddsApi\Enums\SportsEnum;

class UseOddsTest extends TestCase
{
    /** @test */
    public function regions_is_required()
    {
        $this->expectException(\InvalidArgumentException::class);

        $oddsClient = new OddsClient('123456789');

        $oddsClient->getOddsForSport(SportsEnum::RUGBYLEAGUE_NRL);
    }
}