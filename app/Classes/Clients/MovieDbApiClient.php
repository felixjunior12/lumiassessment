<?php

namespace App\Classes\Clients;

use App\Classes\ApiEnum;
use App\Exceptions\Handler;

class MovieDbApiClient extends BaseApiClient
{
    public $api_name = ApiEnum::MOVIES_API;
    /**
     * Search movies
     *
     * @return array
     *
     * @throws Handler
     */
    public function search(array $query): array
    {
        try {
            $endpoint = 'search/movie';
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
     * Search movies genres
     *
     * @return array
     *
     * @throws Handler
     */
    public function genres(): array
    {
        try {
            $endpoint = 'genre/movie/list';
            $endpoint = $this->getUriEndpoint($endpoint);
            $response = $this->doRequest('GET', $endpoint, []);
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