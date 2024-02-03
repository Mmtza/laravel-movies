<?php

namespace App\Services;

use GuzzleHttp\Client;

class TMDBService
{
    protected $apiKey;
    protected $client;

    public function __construct()
    {
        $this->apiKey = config('app.tmdb_api_key');
        $this->client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
    }

    // Movie Genre
    public function getGenresMovies()
    {
        $response = $this->client->get("genre/movie/list", [
            'query' => ['api_key' => $this->apiKey],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // Now Playing Movie
    public function getNowPlayingMovies()
    {
        $response = $this->client->get("movie/now_playing", [
            'query' => ['api_key' => $this->apiKey],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // Movie Popular
    public function getMoviePopular()
    {
        $response = $this->client->get("movie/popular", [
            'query' => ['api_key' => $this->apiKey],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // Movie Details
    public function getMovieDetails($movieId)
    {
        $response = $this->client->get("movie/{$movieId}", [
            'query' => [
                'api_key' => $this->apiKey,
                'append_to_response' => 'credits,videos,images'
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // Movie Credits
    public function getMovieCredits($movieId)
    {
        $response = $this->client->get("movie/{$movieId}/credits", [
            'query' => ['api_key' => $this->apiKey],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // Movie Search
    public function getSearchMovie($searchQuery)
    {
        $response = $this->client->get("search/movie", [
            'query' => [
                'api_key' => $this->apiKey,
                'query' => $searchQuery
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}