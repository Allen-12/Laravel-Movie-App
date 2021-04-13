<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MovieCard extends Component
{
    /**
     * Array of movies
     * @var array
     */
    public $movie;

    /**
     * Array of genres
     * @var array
     */
    public $genres;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($movie, $genres)
    {
        $this->movie = $movie;
        $this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.movie-card');
    }
}
