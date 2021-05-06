<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use App\ViewModels\TvShowViewModel;
use App\ViewModels\TvViewModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class TVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        // Gets popular movies from API
        $popularShows = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/tv/popular")
            ->json()['results'];

        // Gets popular movies from API
        $topRatedShows = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/tv/top_rated")
            ->json()['results'];

        // Gets the genres of the movies from the API
        $genres = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/genre/tv/list")
            ->json()['genres'];

        $viewModel = new TvViewModel($popularShows,$topRatedShows,$genres);

        return view("tv.index",$viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        // Gets details for a specific movie
        $show = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/tv/".$id."?append_to_response=credits,videos,images")
            ->json();

        $viewModel = new TvShowViewModel($show);

        return view("tv.show",$viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
