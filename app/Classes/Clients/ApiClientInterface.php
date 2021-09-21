<?php

namespace App\Classes\Clients;

use GuzzleHttp\Psr7\Response;

interface ApiClientInterface
{

    /**
     * Make a request and return the response
     *
     * @param  string $method
     * @param  string $endpoint
     * @param  array $body
     * @return GuzzleHttp\Psr7\Response
     */
    public function doRequest(string $method, string $endpoint, array $body = []): Response;

    /**
     * Get the base uri endpoint for request API.
     *
     * @param string $endpoint The endpoint to be requested.
     *
     * @return string
     */
    public function getUriEndpoint(string $endpoint): string;
}