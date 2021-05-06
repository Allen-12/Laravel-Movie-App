@extends('layouts.main')

@section('content')
    <div class="container mx-auto mb-6 px-4 pt-16">
        {{--Popular TV--}}
        <div class="popular-tv">
            <h2 class="uppercase tracking-wider text-yellow-500 text-4xl font-semibold">
                Popular TV Shows
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($popularShows as $show)
                    <x-tv-card :show="$show"/>
                @empty
                    <div class="mt-8">
                        <p>No popular shows available</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{--Top Rated Shows--}}
        <div class="popular-tv mt-10">
            <h2 class="uppercase tracking-wider text-yellow-500 text-4xl font-semibold">
                Top Rated Shows
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($topRatedShows as $show)
                    <x-tv-card :show="$show"/>
                @empty
                    <div class="mt-8">
                        <p>No Top Rated TV Shows available at the moment</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
