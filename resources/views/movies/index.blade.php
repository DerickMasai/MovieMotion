@extends('layouts.app')

@section('content')

    @include('layouts.nav-movies')

    @include('layouts.header-movies')

    {{-- Popular --}}
    <section class="my-16 px-8 md:px-16 lg:px-32 flex flex-col">
        <h2 class="gte700 uppercase text-yellow-500 text-md mb-6 mr-auto relative">
            Popular
            <div class="h-0.5 w-4 absolute -bottom-1 left-0 bg-pink-500 bg-opacity-75 rounded-full"></div>
        </h2>

        <div class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 mt-6 gap-8">

            @foreach ($popularMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach

        </div>
    </section>

    {{-- Upcoming --}}
    <section class="my-16 px-8 md:px-16 lg:px-32 flex flex-col">
        <h2 class="gte700 uppercase text-yellow-500 text-md mb-6 mr-auto relative">
            Upcoming
            <div class="h-0.5 w-4 absolute -bottom-1 left-0 bg-pink-500 bg-opacity-75 rounded-full"></div>
        </h2>

        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($upcomingMovies as $movie)
            <div class="mt-6 flex flex-col">
                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="{{ $movie['title'] . ' movie poster' }}" class="h-96 md:h-72 bg-gray-800 rounded-sm md:rounded-md w-full object-cover border-2 border-solid border-pink-500 ring-2 ring-offset-4 ring-offset-gray-900 ring-pink-500 ring-opacity-20">
                <div class="mt-4 px-2 md:px-4 text-white flex flex-col">
                    <h3 class="tt600 text-lg">{{ $movie['title'] }}</h3>
                    <div class="tt500 text-gray-400 flex-shrink-0 flex items-center">
                        <i class="far fa-calendar-times text-pink-500 mr-2"></i>
                        <span class="mt-1">
                            {{ Carbon\Carbon::parse($movie['release_date'])->format('d M, Y') }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Now Playing --}}
    <section class="my-16 px-8 md:px-16 lg:px-32 flex flex-col">
        <h2 class="gte700 uppercase text-yellow-500 text-md mb-6 mr-auto relative">
            Now Playing
            <div class="h-0.5 w-4 absolute -bottom-1 left-0 bg-pink-500 bg-opacity-75 rounded-full"></div>
        </h2>

        <div class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 mt-6 gap-y-12 md:gap-8">

            @foreach ($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach

        </div>
    </section>
@endsection