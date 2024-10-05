<?php

namespace Tests\Unit;

use Orchestra\Testbench\TestCase;
use SethSharp\OddsApi\OddsClient;

class OddsClientTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            'SethSharp\OddsApi\OddsApiServiceProvider'
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->app['config']->set('odds-api.default_region', 'au');
        $this->app['config']->set('odds-api.default_odds_format', 'decimal');
    }

    public function testSetsUpProvidedApiKeyAndDefaultParams()
    {
        $apiKey = 'test-api-key';
        $oddsClient = new OddsClient($apiKey);

        $this->assertEquals('https://api.the-odds-api.com', $oddsClient->getApiEndpoint());

        $this->assertEquals([
            'api_key' => $apiKey,
            'regions' => 'au',
            'oddsFormat' => 'decimal',
        ], $oddsClient->getParams());
    }

    public function testSetsProvidedApiEndpoint()
    {
        $oddsClient = new OddsClient('test-api-key', 'a-new-endpoint');

        $this->assertEquals('a-new-endpoint', $oddsClient->getApiEndpoint());
    }

    public function testSetsRegionString()
    {
        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->setRegion('us');

        $this->assertEquals('us', $oddsClient->getParams()['regions']);
    }

    public function testSetsMarkets()
    {
        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->setMarkets([
            'h2h',
            'spreads',
            'outrights'
        ]);

        $this->assertEquals('0=h2h,1=spreads,2=outrights', $oddsClient->getParams()['markets']);
    }

    public function testSetsBookmakers()
    {
        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->setBookmakers([
            'sportsbet',
            'tab',
            'topsport'
        ]);

        $this->assertEquals('0=sportsbet,1=tab,2=topsport', $oddsClient->getParams()['bookmakers']);
    }
}
