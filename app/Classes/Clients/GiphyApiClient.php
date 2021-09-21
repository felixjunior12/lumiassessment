<?php

namespace App\Classes\Clients;

use App\Classes\ApiEnum;
use App\Exceptions\Handler;

class GiphyApiClient extends BaseApiClient
{
    public $api_name = ApiEnum::GIPHY_API;
    /**
     * Return list of trending gifs
     *
     * @return array
     *
     * @throws Handler
     */
    public function trending(): array
    {
        try {
            $endpoint = 'trending';
            $endpoint = $this->getUriEndpoint($endpoint);
            $response = $this->doRequest('GET', $endpoint);
            if ($response->getStatusCode() != 200) {
                throw new Handler(
                    'Request has returned with error code: ' . $response->getStatusCode()
                );
            }
            return json_decode($response->getBody()->getContents(), true);
        } catch(Handler $ex) {
            throw new Handler();
        }
    }

    /**
     * Search gifs
     *
     * @return array
     *
     * @throws Handler
     */
    public function search(array $query): array
    {
        try {
            $endpoint = 'search';
            $endpoint = $this->getUriEndpoint($endpoint);
            $response = $this->doRequest('GET', $endpoint, [], $query);
            if ($response->getStatusCode() != 200) {
                throw new Handler(
                    'Request has returned with error code: ' . $response->getStatusCode()
                );
            }
            return json_decode($response->getBody()->getContents(), true);
        } catch(Handler $ex) {
            throw new Handler();
        }
    }

    /**
     * Get random gif
     *
     * @return array
     *
     * @throws Handler
     */
    public function random(array $query): array
    {
        try {
            $endpoint = 'random';
            $endpoint = $this->getUriEndpoint($endpoint);
            $response = $this->doRequest('GET', $endpoint, [], $query);
            if ($response->getStatusCode() != 200) {
                throw new Handler(
                    'Request has returned with error code: ' . $response->getStatusCode()
                );
            }
            return json_decode($response->getBody()->getContents(), true);
        } catch(Handler $ex) {
            throw new Handler();
        }
    }
}