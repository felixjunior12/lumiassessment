<?php

namespace App\Classes\Clients;

use App\Classes\ApiEnum;
use App\Exceptions\Handler;

class NasaApiClient extends BaseApiClient
{
    public $api_name = ApiEnum::NASA_API;
    /**
     * Return list of trending gifs
     *
     * @return array
     *
     * @throws Handler
     */
    public function getApod(): array
    {
        try {
            $endpoint = 'apod';
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
}