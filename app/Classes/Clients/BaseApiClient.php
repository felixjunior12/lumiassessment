<?php

namespace App\Classes\Clients;

use GuzzleHttp\Psr7\Response;


class BaseApiClient implements ApiClientInterface
{
    /**
     * Client to manage Http requests
     *
     * @var GuzzleHttp\Client
     */
    private $http_client;

    /**
     * Api type
     *
     * @var String
     */
    private $api_name;

    /**
     * API base uri
     *
     * @var String
     */
    private $base_uri;

    /**
     * API key
     *
     * @var String
     */
    private $api_key;

    /**
     * BaseApiClient constructor.
     *
     */
    function __construct(string $base_uri, string $api_key)
    {
        $this->http_client = new \GuzzleHttp\Client();
        $this->base_uri = $base_uri;
        $this->api_key = $api_key;
    }

    /**
     * Make a request and return the response
     *
     * @param  string $method
     * @param  string $endpoint
     * @param  array $body
     * @param  array $query
     * @return GuzzleHttp\Psr7\Response
     */
    public function doRequest(string $method, string $endpoint, array $body = [], ?array $query = null): Response
    {

        $default_query = [
            'api_key' => $this->api_key
        ];
        if($query) {
            foreach($query as $key => $value){
                $default_query[$key] = $value;
            }
        }
        return $this->http_client->request(
            $method,
            $endpoint,
            [
                'headers' => [
                    'Content-type' => 'application/json'
                ],
                'query' => $default_query,
                'body'    => empty($body) ? '' : json_encode($body)
            ]
        );
    }

    /**
     * Get the base uri endpoint for request API.
     *
     * @param string $endpoint The endpoint to be requested.
     *
     * @return string
     */
    public function getUriEndpoint(string $endpoint): string
    {
        $uri_endpoint = '';
        if (!empty($this->base_uri)) {
            $uri_endpoint .= $this->base_uri;
        }

        return $uri_endpoint . '/' . $endpoint;
    }

    public function getApiName(): string
    {
        return $this->api_name;
    }
}