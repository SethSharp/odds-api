# Odds API Wrapper

[![Tests](https://github.com/SethSharp/odds-api/actions/workflows/testing.yml/badge.svg)](https://github.com/SethSharp/odds-api/actions/workflows/testing.yml)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/sethsharp/odds-api.svg?style=flat-square)](https://packagist.org/packages/sethsharp/odds-api)
[![Total Downloads](https://img.shields.io/packagist/dt/sethsharp/odds-api.svg?style=flat-square)](https://packagist.org/packages/sethsharp/odds-api)


A convenient API wrapper for the Odds API, designed for Composer environments such as Laravel.

## About "The Odds API"
[The Odds API](https://the-odds-api.com/) is a simple and very well-documented API, allowing for fast, low-cost integration. It covers over 70 sports and over 40 bookmakers - with a continuing expanding offering. The Odds API is an Australian company based in Melbourne since 2017.

## So why make a wrapper
A wrapper simplifies the usage and implementation of powerful APIs like "The Odds API" It abstracts the complexities of direct API interactions, providing a more user-friendly interface for us developers.

# Contribution Guide
This is an open-source project, so contributions are welcome! Whether you want to add new features, fix bugs, or improve documentation, your help is appreciated. Submit your PR for review and I will review them as soon as possible.

**Sport Enum opportunity**
This package uses an enum to define the sports you can pass to the endpoints, this ensures you don't make a typo or have
to worry about remembering the exact grammar. Currently, there are only a couple sports so if you need the support for more,
make a PR to add them in.

# Steps for Installation
### Composer
```bash
composer require sethsharp/odds-api
```

### Publish Config file
This file contains some essential information the Client requires to make successful requests
```bash
php artisan vendor:publish --tag="odds-api-config"
```

### Example Usages
You can simply create a new Client, passing in your api key and thats it!
```php
$client = new OddsClient(config('odds-api.api_key'));

$response = $client->setRegion('us')
    ->dateFormat('iso')
    ->getOddsForSport(SportsEnum::RUGBYLEAGUE_NRL);

return $response->json();
```

This package is setup in a way that all the params you may need are functions which can be chained together on one
line, as they all return `$this`. Once you call one of the API endpoints which return a response, you can no longer call 
these functions.

**Another way to define your Client Class**

You can bind your Client class at runtime in the AppServiceProvider. Allowing you to simply define the Client 
in the constructor of your class, without having to constantly pass the api credentials.
```php
$this->app->bind(OddsClient::class, function () {
    return new OddsClient(config('odds-api.api_key'));
});
```
then your class may look like
```php
public function __invoke(OddsClient $client): Response
{
    $response = $client->setRegion('us')
        ->getOddsForSport(SportsEnum::RUGBYLEAGUE_NRL);
        
    return $response->json();
}
```

**Additional:**
When constructing the Client, it will have some default parameters
```php
$this->params = [
    'api_key' => $this->apiKey,
    'regions' => config('odds-api.default_region'),
    'oddsFormat' => config('odds-api.default_odds_format')
];
```
This avoids having to define these on each request, but they can be overwritten with their corresponding class functions ie;
`setRegions('au')`

To help manage your quota, there are helpers that you can call to return the number of requests used and remaining. Checkout the `UseHandleHeaders` trait, which
can be called on any `OddsClient` instant.

Also, if this API ever becomes outdated for a small period of time, and you require to use new parameters, you can utilise
the `addParams()` function, which accepts an array where you can pass any new parameters.

## Credits
- [Seth Sharp](https://github.com/SethSharp)
- [All Contributors](https://github.com/SethSharp/odds-api/graphs/contributors)
    
