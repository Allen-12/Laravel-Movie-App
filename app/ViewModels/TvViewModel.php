<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popularShows;
    public $topRatedShows;
    public $genres;

    public function __construct($popularShows, $topRatedShows, $genres)
    {
        $this->popularShows = $popularShows;
        $this->topRatedShows = $topRatedShows;
        $this->genres = $genres;
    }

    public function popularShows()
    {
        return $this->formatTV($this->popularShows);
    }

    public function topRatedShows()
    {
        return $this->formatTV($this->topRatedShows);
    }

    public function genres()
    {
        // Maps the genre ID from the API to the genre name
        return collect($this->genres)->mapWithKeys(function ($genre){
            return [
                $genre['id'] => $genre['name']
            ];
        });
    }

    private function formatTV($shows): Collection
    {
        return collect($shows)->map(function ($show){
            $genresFormatted = collect($show['genre_ids'])->mapWithKeys(function ($value){
                return [$value => $this->genres()->get($value)];
            })->implode(", ");

            return collect($show)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w342'. $show['poster_path'],
                'vote_average' => $show['vote_average'] * 10 .'%',
                'first_air_date' => Carbon::parse($show['first_air_date'])->format("M d, Y"),
                'genres' => $genresFormatted
            ])->only([
                'poster_path', 'id', 'genre_ids', 'name', 'vote_average', 'overview', 'first_air_date', 'genres'
            ]);
        });
    }
}
