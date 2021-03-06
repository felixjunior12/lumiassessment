<?php

namespace App\Http\Controllers;

use App\Classes\ApiEnum;
use App\Classes\ClientFactory;
use Illuminate\Http\Request;
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

    /**
     * Search gifs
     */
    public function searchGifs(Request $request)
    {
        $this->client = ClientFactory::makeClient(ApiEnum::GIPHY_API);
        $query = [
            'q' => $request->input('keyword'),
        ];

        return $this->client->search($query);

    }

    /**
     * Get a random gif
     */
    public function randomGif(Request $request)
    {
        $this->client = ClientFactory::makeClient(ApiEnum::GIPHY_API);
        $query = [
            'tag' => $request->input('tag'),
        ];

        return $this->client->random($query);

    }

    /**
     * Return the Astronomy Picture of the Day
     */
    public function getAstronomyPicture()
    {
        $this->client = ClientFactory::makeClient(ApiEnum::NASA_API);

        return json_encode($this->client->getApod());
    }

    /**
     * Return a list of movies matching with the search
     */
    public function searchMovie(Request $request)
    {

        $this->client = ClientFactory::makeClient(ApiEnum::MOVIES_API);
        $query = [
            'query' => $request->input('name'),
            'language' => $request->input('language')
        ];
        return json_encode($this->client->search($query));
    }

    /**
     * Return a list of movies genres
     */
    public function listMovieGenres()
    {
        $this->client = ClientFactory::makeClient(ApiEnum::MOVIES_API);

        return json_encode($this->client->genres());
    }
}
