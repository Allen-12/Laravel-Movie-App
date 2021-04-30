@extends('layouts.main')

@section('content')
    <div class="container mx-auto mb-6 px-4 pt-16">
        {{--Popular Movies--}}
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-yellow-500 text-4xl font-semibold">
                Popular Movies
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres"/>
                @empty
                    <div class="mt-8">
                        <p>No popular movies available</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{--Now Playing Movies--}}
        <div class="popular-movies mt-10">
            <h2 class="uppercase tracking-wider text-yellow-500 text-4xl font-semibold">
                Now Playing
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie"/>
                @empty
                    <div class="mt-8">
                        <p>Now Playing movies are not available</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
