<?php

namespace App\Http\Controllers;

use App\Services\TMDBService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tmdbService = new TMDBService();
        // Get Popular Movies from Service
        $moviePopular = $tmdbService->getMoviePopular();
        // Get Movies Genres from Service
        $movieGenre = $tmdbService->getGenresMovies();
        // Get Now Playing Movies from Service
        $nowPlaying = $tmdbService->getNowPlayingMovies();

        $genres = collect($movieGenre['genres'])->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view('index', [
            "popularMovies" => $moviePopular['results'],
            "nowPlayingMovies" => $nowPlaying['results'],
            "genres" => $genres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tmdbService = new TMDBService();
        // Get Popular Movies from Service
        $movieDetails = $tmdbService->getMovieDetails($id);

        return view('show', [
            'movie' => $movieDetails,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}