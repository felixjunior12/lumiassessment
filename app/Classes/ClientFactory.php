<?php

namespace App\Classes;

use App\Classes\Clients\ApiClientInterface;
use App\Classes\Clients\GiphyApiClient;
use App\Classes\Clients\NasaApiClient;
use App\Exceptions\Handler;
/**
 * 
 * Create a client object accordint to the Api Requested
 * 
 * fmicolta
 */

class ClientFactory
{

    /**
     * Create the client
     * 
     * @return ApiClient
     */
    public static function makeClient(?string $api_name): ApiClientInterface
    {
        switch($api_name) {
            case ApiEnum::GIPHY_API:
                return new GiphyApiClient(env('BASE_URI_GIPHY'), env('APP_KEY_GIPHY'));
            case ApiEnum::NASA_API:
                return new NasaApiClient(env('BASE_URI_NASA'), env('APP_KEY_NASA'));
            default:
                throw new Handler('Api name do not recognized ');
        }
    } 

}
