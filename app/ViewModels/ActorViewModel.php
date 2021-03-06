<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public $actor;
    public $social;
    public $credits;

    public function __construct($actor,$social,$credits)
    {
        $this->actor = $actor;
        $this->social = $social;
        $this->credits = $credits;
    }

    public function actor()
    {
        return collect($this->actor)->merge([
            'birthday' => Carbon::parse($this->actor['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($this->actor['birthday'])->age,
            'profile_path' => $this->actor['profile_path']
                ? 'https://image.tmdb.org/t/p/w300'. $this->actor['profile_path']
                : 'https://ui-avatars.com/api/?size=235&name='.$this->actor['name'],
        ]);
    }

    public function social()
    {
        return collect($this->social)->merge([
            'twitter' => $this->social['twitter_id'] ? "https:twitter.com/". $this->social['twitter_id'] : null,
            'facebook' => $this->social['facebook_id'] ? "https:facebook.com/".$this->social['facebook_id'] : null,
            'instagram' => $this->social['instagram_id'] ? "https:instagram.com/".$this->social['instagram_id'] : null,
        ]);
    }

    public function knownForTitles(): Collection
    {
        $castTitles = collect($this->credits)->get('cast');

        return collect($castTitles)->sortByDesc('popularity')->take(5)->map(function ($movie){
            if (isset($movie['title']))
            {
                $title = $movie['title'];
            }
            elseif ($title = $movie['name'])
            {
                $title = $movie['name'];
            }
            else
            {
                $title = "Untitled";
            }
            return collect($movie)->merge([
               'poster_path' =>  $this->actor['profile_path']
                   ? 'https://image.tmdb.org/t/p/w185'. $movie['poster_path']
                   : 'https://ui-avatars.com/api/?size=185&name='.$movie['title'],
                'title' => $title,
                'linkToPage' => $movie['media_type'] == 'movie' ? route('movies.show',$movie['id']) : route('tv.show',$movie['id']),
            ]);
        });
    }

    public function credits()
    {
        $castTitles = collect($this->credits)->get('crew');

        return collect($castTitles)->map(function ($movie){
            // Set value of release date
            if (isset($movie['release_date']))
            {
                $releaseDate = $movie['release_date'];
            }
            elseif (isset($movie['first_air_date']))
            {
                $releaseDate = $movie['first_air_date'];
            }
            else
            {
                $releaseDate = '';
            }

            // Set value of title depending on whether it is a movie or series
            if (isset($movie['title']))
            {
                $title = $movie['title'];
            }
            elseif (isset($movie['name']))
            {
                $title = $movie['name'];
            }
            else
            {
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'release_date' => $releaseDate,
                'release_year' => Carbon::parse($releaseDate)->format("Y") ?? 'Future',
                'title' => $title,
                'character' => $movie['character'] ?? "Unknown"
            ]);
        })->sortByDesc("release_date");
    }
}
