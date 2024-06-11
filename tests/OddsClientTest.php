<?php

use PHPUnit\Framework\TestCase;

class OddsClientTest extends TestCase
{
    /** @test */
    public function initiation_is_successful()
    {
        $oddsClient = new \SethSharp\OddsApi\OddsClient('123456789');

        $this->assertInstanceOf('\SethSharp\OddsApi\OddsClient', $oddsClient);

        $this->assertSame($oddsClient->getApiEndpoint(), 'https://api.the-odds-api.com');
    }
}