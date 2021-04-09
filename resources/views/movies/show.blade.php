@extends('layouts.main')

@section('content')
    {{--Start Movie Info--}}
    <div class="movie-info border-b border-gray-800 ">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ asset('images/22-jump-street.jpg') }}" alt="22" class="w-64 md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">22 Jump Street (2014)</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-yellow-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    <span class="ml-1">85%</span>
                    <span class="mx-2">|</span>
                    <span>April 9, 2021</span>
                    <span class="mx-2">|</span>
                    <span>Action, Comedy, Drama</span>
                </div>
                <p class="text-gray-300 mt-8">
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum."
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Bong Jomgho</div>
                            <div class="text-sm text-gray-400">Screenplay, Director</div>
                        </div>
                        <div class="ml-8">
                            <div>Bong Jomgho</div>
                            <div class="text-sm text-gray-400">Screenplay, Director</div>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <button type="submit" class="flex items-center bg-yellow-500 text-gray-900 rounded font-semibold
                    px-5 py-4 hover:bg-yellow-600 transition ease-in-out duration-150">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        Play Trailer
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--End Movie Info--}}

    {{--Start Movie Cast--}}
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>

            {{--Cast start--}}
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <div class="mt-8">
                    <a href="">
                        <img src="{{ asset('images/channing-tatum.jpg') }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Channing Tatum</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <span>Funny Guy</span>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="">
                        <img src="{{ asset('images/channing-tatum.jpg') }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Channing Tatum</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <span>Funny Guy</span>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="">
                        <img src="{{ asset('images/channing-tatum.jpg') }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Channing Tatum</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <span>Funny Guy</span>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="">
                        <img src="{{ asset('images/channing-tatum.jpg') }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Channing Tatum</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <span>Funny Guy</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
