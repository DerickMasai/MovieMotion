@extends('layouts.app')

@section('content')

    <nav class="px-32 py-5 m-0 border-b border-solid border-gray-800 flex flex-row">
        @include('layouts.nav-movies')
    </nav>

    @include('layouts.header')

    {{-- Popular --}}
    <section class="my-16 px-32 flex flex-col">
        <h2 class="font-bold uppercase text-sm tracking-wide text-yellow-600 pro700">Popular</h2>

        <div class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 mt-6 gap-8">

            @foreach ($popularMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach

        </div>
    </section>

    {{-- Upcoming --}}
    <section class="my-16 px-32 flex flex-col">
        <h2 class="font-bold uppercase text-sm tracking-wide text-yellow-600 pro700">Upcoming</h2>

        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($upcomingMovies as $movie)
            <div class="mt-6 flex flex-col">
                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="{{ $movie['title'] . ' movie poster' }}" class="h-96 md:h-72 bg-gray-800 rounded-sm md:rounded-md w-full object-cover border-2 border-solid border-pink-500 ring-2 ring-offset-4 ring-offset-gray-900 ring-pink-500 ring-opacity-20">
                <div class="mt-4 px-2 md:px-4 text-white flex flex-row md:flex-col">
                    <h3 class="tt600 text-lg">{{ $movie['title'] }}</h3>
                    <div class="tt500 text-gray-400 flex-shrink-0 flex items-center ml-auto md:ml-0">
                        <i class="far fa-calendar-times text-pink-500 mr-2 opacity-0 md:opacity-100"></i>
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
    <section class="my-16 px-32 flex flex-col">
        <h2 class="font-bold uppercase text-sm tracking-wide text-yellow-600 pro700">Now Playing</h2>

        <div class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 mt-6 gap-y-12 md:gap-8">

            @foreach ($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach

        </div>
    </section>
@endsection