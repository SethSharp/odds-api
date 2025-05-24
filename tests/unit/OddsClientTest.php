<?php

use Orchestra\Testbench\TestCase;
use SethSharp\OddsApi\OddsClient;

uses(TestCase::class)
    ->group('odds-client')
    ->beforeEach(function () {
        $this->app['config']->set('odds-api.default_region', 'au');
        $this->app['config']->set('odds-api.default_odds_format', 'decimal');
    });

// Define package providers
function getPackageProviders($app)
{
    return [
        'SethSharp\OddsApi\OddsApiServiceProvider'
    ];
}

test('sets up provided api key and default params', function () {
    $apiKey = 'test-api-key';
    $oddsClient = new OddsClient($apiKey);

    expect($oddsClient->getApiEndpoint())->toBe('https://api.the-odds-api.com')
        ->and($oddsClient->getParams())->toBe([
            'api_key' => $apiKey,
            'regions' => 'au',
            'oddsFormat' => 'decimal',
        ]);
});

test('sets provided api endpoint', function () {
    $oddsClient = new OddsClient('test-api-key', 'a-new-endpoint');

    expect($oddsClient->getApiEndpoint())->toBe('a-new-endpoint');
});

test('sets region string', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->setRegion('us');

    expect($oddsClient->getParams()['regions'])->toBe('us');
});

test('sets markets', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->setMarkets([
        'h2h',
        'spreads',
        'outrights'
    ]);

    expect($oddsClient->getParams()['markets'])->toBe('0=h2h,1=spreads,2=outrights');
});

test('sets bookmakers', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->setBookmakers([
        'sportsbet',
        'tab',
        'topsport'
    ]);

    expect($oddsClient->getParams()['bookmakers'])->toBe('0=sportsbet,1=tab,2=topsport');
});

test('sets events string', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->setEvents('some-event');

    expect($oddsClient->getParams()['eventIds'])->toBe('some-event');
});

test('sets events array', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->setEvents([
        'event-1',
        'event-2',
        'event-3',
    ]);

    expect($oddsClient->getParams()['eventIds'])->toBe('event-1,event-2,event-3');
});

test('sets odds format', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->oddsFormat('american');

    expect($oddsClient->getParams()['oddsFormat'])->toBe('american');
});

test('sets date format', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->dateFormat('unix');

    expect($oddsClient->getParams()['dateForm'])->toBe('unix');
});

test('commence time from and converts to iso', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->commenceTimeFrom('2024-05-10');

    expect($oddsClient->getParams()['commenceTimeFrom'])->toBe('2024-05-10T00:00:00Z');
});

test('commence time from with iso format', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->commenceTimeFrom('2024-05-10T00:00:00Z', isIsoFormat: true);

    expect($oddsClient->getParams()['commenceTimeFrom'])->toBe('2024-05-10T00:00:00Z');
});

test('commence time to and converts to iso', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->commenceTimeTo('2024-05-10');

    expect($oddsClient->getParams()['commenceTimeTo'])->toBe('2024-05-10T00:00:00Z');
});

test('commence time to with iso format', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->commenceTimeTo('2024-05-10T00:00:00Z', isIsoFormat: true);

    expect($oddsClient->getParams()['commenceTimeTo'])->toBe('2024-05-10T00:00:00Z');
});

test('can add custom params', function () {
    $oddsClient = new OddsClient('test-api-key');

    $oddsClient->addParams([
        'a-new-param' => 'some-value'
    ]);

    expect($oddsClient->getParams())->toBe([
        'api_key' => 'test-api-key',
        'regions' => 'au',
        'oddsFormat' => 'decimal',
        'a-new-param' => 'some-value',
    ]);
});
