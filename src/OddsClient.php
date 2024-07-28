<?php

namespace SethSharp\OddsApi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use SethSharp\OddsApi\Enums\SportsEnum;
use GuzzleHttp\Exception\RequestException;
use SethSharp\OddsApi\Traits\UseHandleHeaders;

class OddsClient
{
    use UseHandleHeaders;

    private Client $client;
    private string $apiKey;
    private string $apiEndpoint = 'https://api.the-odds-api.com';
    private array $params = [];

    public function __construct(string $apiKey, $apiEndpoint = null)
    {
        $this->apiKey = $apiKey;

        if ($apiEndpoint) {
            $this->apiEndpoint = $apiEndpoint;
        }

        $this->client = new Client([
            'base_uri' => $this->apiEndpoint,
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);

        $this->setDefaultParams();
    }

    public function getApiEndpoint(): string
    {
        return $this->apiEndpoint;
    }

    protected function get($endpoint): Response
    {
        try {
            return $this->client->get('/' . config('odds-api.version') . $endpoint, [
                'query' => $this->params
            ]);
        } catch (RequestException $e) {
            throw new \RuntimeException('Request failed: ' . $e->getMessage());
        }
    }

    private function setDefaultParams(): void
    {
        $this->params = [
            'api_key' => $this->apiKey,
            'regions' => config('odds-api.default_region'),
            'oddsFormat' => config('odds-api.default_odds_format')
        ];
    }

    /**
     * @return Response
     */
    public function getSports(): Response
    {
        return $this->get('/sports');
    }

    /**
     * @param SportsEnum $sport
     * @return Response
     */
    public function getOddsForSport(SportsEnum $sport): Response
    {
        return $this->get("/sports/$sport->value/odds");
    }

    /**
     * @param SportsEnum $sport
     * @return Response
     */
    public function getScoresForSport(SportsEnum $sport): Response
    {
        return $this->get("/sports/{$sport->value}/scores");
    }

    /**
     * @param SportsEnum $sport
     * @return Response
     */
    public function getEventsForSport(SportsEnum $sport): Response
    {
        return $this->get("/sports/{$sport->name}/events");
    }

    /**
     * @param SportsEnum $sport
     * @param string $event
     * @return Response
     */
    public function getOddsForEvent(SportsEnum $sport, string $event): Response
    {
        return $this->get("/sports/{$sport->value}/events/{$event}/odds");
    }

    /**
     * @param string $regionCode
     * @return $this
     */
    public function setRegion(string $regionCode): self
    {
        $this->params['regions'] = $regionCode;

        return $this;
    }

    /**
     * https://the-odds-api.com/sports-odds-data/betting-markets.html
     *
     * @param mixed $markets
     * @return $this
     */
    public function setMarkets(mixed $markets): self
    {
        if (is_array($markets)) {
            $marketString = http_build_query($markets, '', ',');
        }

        $this->params['markets'] = $marketString ?? $markets;

        return $this;
    }

    /**
     * https://the-odds-api.com/sports-odds-data/bookmaker-apis.html
     *
     * @param mixed $bookmakers
     * @return $this
     */
    public function setBookmakers(mixed $bookmakers): self
    {
        if (is_array($bookmakers)) {
            $bookmakerString = http_build_query($bookmakers, '', ',');
        }

        $this->params['markets'] = $bookmakerString ?? $bookmakers;

        return $this;
    }

    /**
     * @param string $eventId
     * @return $this
     */
    public function setEvent(string $eventId): self
    {
        $this->params['eventIds'] = $eventId;

        return $this;
    }

    /**
     * decimal or american
     *
     * @param string $format
     * @return $this
     */
    public function oddsFormat(string $format): self
    {
        $this->params['oddsFormat'] = $format;

        return $this;
    }

    /**
     * Format of returned timestamps. Can be iso (ISO8601) or unix timestamp (seconds since epoch)
     *
     * @param string $dateFormat
     * @return $this
     */
    public function dateFormat(string $dateFormat): self
    {
        $this->params['dateForm'] = $dateFormat;

        return $this;
    }

    /**
     * Filters the response to show events that commence on and after this parameter. Values are in ISO8601 format
     *
     * @param string $time
     * @return $this
     */
    public function commenceTimeFrom(string $time): self
    {
        $this->params['commenceTimeFrom'] = $time;

        return $this;
    }

    /**
     * Filters the response to show events that commence on and before this parameter. Values are in ISO8601 format
     *
     * @param string $time
     * @return $this
     */
    public function commenceTimeTo(string $time): self
    {
        $this->params['commenceTimeTo'] = $time;

        return $this;
    }

    /**
     * Additional params in case API is not caught up with the latest API
     *
     * @param array $params
     * @return self
     */
    public function addParams(array $params): self
    {
        $this->params = array_merge_recursive($this->params, $params);

        return $this;
    }
}
