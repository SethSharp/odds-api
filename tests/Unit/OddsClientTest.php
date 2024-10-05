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

    public function testSetsEventsString()
    {

        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->setEvents('some-event');

        $this->assertEquals('some-event', $oddsClient->getParams()['eventIds']);
    }

    public function testSetsEventsArray()
    {

        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->setEvents([
            'event-1',
            'event-2',
            'event-3',
        ]);

        $this->assertEquals('event-1,event-2,event-3', $oddsClient->getParams()['eventIds']);
    }

    public function testSetsOddsFormat()
    {
        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->oddsFormat('american');

        $this->assertEquals('american', $oddsClient->getParams()['oddsFormat']);
    }

    public function testSetsDateFormat()
    {
        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->dateFormat('unix');

        $this->assertEquals('unix', $oddsClient->getParams()['dateForm']);
    }

    public function testCommenceTimeFromAndConvertsToIso()
    {
        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->commenceTimeFrom('2024-05-10');

        $this->assertEquals('2024-05-10T00:00:00Z', $oddsClient->getParams()['commenceTimeFrom']);
    }

    public function testCommenceTimeFrom()
    {
        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->commenceTimeFrom('2024-05-10T00:00:00Z', isIsoFormat: true);

        $this->assertEquals('2024-05-10T00:00:00Z', $oddsClient->getParams()['commenceTimeFrom']);
    }

    public function testCommenceTimeToAndConvertsToIso()
    {
        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->commenceTimeTo('2024-05-10');

        $this->assertEquals('2024-05-10T00:00:00Z', $oddsClient->getParams()['commenceTimeTo']);
    }

    public function testCommenceTimeTo()
    {
        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->commenceTimeTo('2024-05-10T00:00:00Z', isIsoFormat: true);

        $this->assertEquals('2024-05-10T00:00:00Z', $oddsClient->getParams()['commenceTimeTo']);
    }

    public function testCanAddCustomParams()
    {
        $oddsClient = new OddsClient('test-api-key');

        $oddsClient->addParams([
            'a-new-param' => 'some-value'
        ]);

        $this->assertEquals([
            'api_key' => 'test-api-key',
            'regions' => 'au',
            'oddsFormat' => 'decimal',
            'a-new-param' => 'some-value',
        ], $oddsClient->getParams());
    }
}
