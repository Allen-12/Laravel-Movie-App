<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        // Gets popular movies from API
        $popularMovies = Http::withToken(config('services.tmdb.token'))
                        ->get("https://api.themoviedb.org/3/movie/popular")
                        ->json()['results'];

        // Gets popular movies from API
        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/now_playing")
            ->json()['results'];

        // Gets the genres of the movies from the API
        $genres = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/genre/movie/list")
            ->json()['genres'];

        $viewModel = new MoviesViewModel($popularMovies,$nowPlayingMovies,$genres);

        return view("movies.index",$viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View
     */
    public function show($id)
    {
        // Gets details for a specific movie
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/".$id."?append_to_response=credits,videos,images")
            ->json();

        $viewModel = new MovieViewModel($movie);

        return view("movies.show",$viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
