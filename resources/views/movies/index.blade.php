@extends('layouts.app')

@section('content')

    <nav class="px-32 py-5 m-0 border-b border-solid border-gray-800 flex flex-row">
        @include('layouts.nav-movies')
    </nav>

    <section class="px-32 mt-16 grid grid-cols-6 gap-24">
        @foreach ($headerMovieCast['cast'] as $actor)

                {{-- Limit the number of results to 10 --}}
                @if ($loop->index < 6)

                    <x-story-card :actor="$actor" />

                @else
                    
                    @break
                        
                @endif

            @endforeach
        
    </section>

    @include('layouts.header')

    <section class="my-16 px-32 flex flex-col">
        <h2 class="font-bold uppercase text-sm tracking-wide text-yellow-600 pro700">Popular Movies</h2>

        <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 mt-6 gap-8">

            @foreach ($popularMovies as $movie)

                {{-- Limit the number of results to 10 --}}
                @if ($loop->index < 10)

                    <x-movie-card :movie="$movie" :genres="$genres" />

                @else
                    
                    @break
                        
                @endif

            @endforeach

        </div>
    </section>

    <section class="my-16 px-32 flex flex-col">
        <h2 class="font-bold uppercase text-sm tracking-wide text-yellow-600 pro700">Popular Movies</h2>

        <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 mt-6 gap-8">

            @foreach ($popularMovies as $movie)

                {{-- Limit the number of results to 10 --}}
                @if ($loop->index < 10)

                    <x-movie-card :movie="$movie" :genres="$genres" />

                @else
                    
                    @break
                        
                @endif

            @endforeach

        </div>
    </section>

    <section class="my-16 px-32 flex flex-col">
        <h2 class="font-bold uppercase text-sm tracking-wide text-yellow-600 pro700">Now Playing</h2>

        <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 mt-6 gap-8">

            @foreach ($nowPlayingMovies as $movie)

                {{-- Limit the number of results to 10 --}}
                @if ($loop->index < 10)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @else
                    @break        
                @endif

            @endforeach

        </div>
    </section>
@endsection