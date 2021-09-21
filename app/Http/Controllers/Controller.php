<?php

namespace App\Http\Controllers;

use App\Classes\ApiEnum;
use App\Classes\ClientFactory;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    // Client
    public $client;

    /**
     * Return the Trending gifs
     */
    public function getTrendingGifs()
    {
        $this->client = ClientFactory::makeClient(ApiEnum::GIPHY_API);

        return $this->client->trending();

    }
}