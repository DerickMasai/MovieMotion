@extends('layouts.app')

@section('content')

    <nav class="px-32 py-5 m-0 border-b border-solid border-gray-800 flex flex-row" x-data="{responsiveNav : false}">
        @include('layouts.nav-shows')
    </nav>

    @include('layouts.header-shows')

    {{-- Popular --}}
    <section class="my-16 px-8 md:px-32 flex flex-col">
        <h2 class="font-bold uppercase text-md tracking-wide text-yellow-600 pro700">Popular</h2>

        <div class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 mt-6 gap-y-12 md:gap-8">

            @foreach ($popularShows as $tvshow)
                <x-show-card :tvshow="$tvshow" :genres="$genres" />
            @endforeach

        </div>
    </section>

    {{-- Airing Today --}}
    <section class="my-16 px-8 md:px-32 flex flex-col">
        <h2 class="font-bold uppercase text-md tracking-wide text-yellow-600 pro800">
            Showing Today
        </h2>

        <div class="w-full mt-6 grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($airingToday as $show)
                <div class="flex flex-col">
                    <a href="{{ route('movies.show', $show['id']) }}" class="h-96 md:h-72 w-full bg-gray-800 rounded-md ring-2 ring-offset-4 ring-offset-gray-900 ring-pink-500 ring-opacity-20">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $show['poster_path'] }}" alt="{{ $show['name'] . ' show poster' }}" class="h-full w-full rounded-md border-2 border-solid border-pink-500 object-cover">
                    </a>
                    <div class="mt-4 px-2 md:px-4 text-white flex flex-col">
                        <h3 class="tt600 text-lg">{{ $show['name'] }}</h3>
                        <span class="mt-1 md:mt-0 tt300 text-gray-400 text-sm">
                            @foreach ($show['genre_ids'] as $genre)
                                {{$genres->get($genre)}}@if(!$loop->last),@endif
                            @endforeach
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Currently Airing --}}
    <section class="my-16 px-8 md:px-32 flex flex-col">
        <h2 class="font-bold uppercase text-md tracking-wide text-yellow-600 pro700">On Air</h2>

        <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 mt-6 gap-y-12 md:gap-8">

            @foreach ($currentlyAiring as $tvshow)

                @if ($loop->index < 10)

                    <x-show-card :tvshow="$tvshow" :genres="$genres" />
                    
                @else
                    
                    @break
                        
                @endif

            @endforeach

        </div>
    </section>
@endsection