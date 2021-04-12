@extends('layouts.app')

@section('content')

    <header class="min-h-96 mt-16 mb-8 mx-32 rounded-xl justify-center flex flex-row z-10"
    x-data="{isOpen: false}"
    @keydown.escape.window="isOpen = false"
    >
        <section class="w-1/2 flex">
            <div class="w-full h-full z-10 rounded-xl rounded-l-none" style="background: url('{{ 'https://image.tmdb.org/t/p/w500/' . $headerShow['poster_path'] }}') no-repeat center;background-size: cover"></div>
        </section>

        <section class="w-1/2 p-16 flex flex-col">
            <small class="tt300 text-gray-300
            ">
                @foreach ($headerShow['genre_ids'] as $genre)
                    {{$genres->get($genre)}}@if(!$loop->last),@endif
                @endforeach
            </small>
            <a href="{{ route('tv-shows.show', $headerShow['id']) }}" class="mt-2 tt600 text-white text-5xl">
                {{ $headerShow['name'] }}
            </a>
            <i class="tt300 italic text-sm">
                
            </i>
            <div class="my-2 flex flex-row">
                    @if (($headerShow['vote_average'] * 10) > 70)
                        <span class="tt400 text-green-500 text-sm">
                            <i class="fas fa-star text-yellow-500 mr-1"></i>
                            {{ $headerShow['vote_average'] * 10 . '%'}}
                        </span>
                    @elseif (($headerShow['vote_average'] * 10) > 50 && ($headerShow['vote_average'] * 10) < 71)
                        <span class="tt400 text-yellow-500 text-sm">
                            {{ $headerShow['vote_average'] * 10 . '%'}}
                        </span>
                    @else
                        <span class="tt400 text-red-500 text-sm">
                            {{ $headerShow['vote_average'] * 10 . '%'}}
                        </span>
                    @endif
                
                <span class="ml-2 tt500 text-white text-sm">
                    {{ Carbon\Carbon::parse($headerShow['first_air_date'])->format('d M, Y') }}
                </span>
            </div>
            <p class="tt300 text-gray-200 text-md">
                {{ $headerShow['overview'] }}
            </p>
            <button 
            @click="isOpen = true" class="shadow-lg pt-3 pb-2 px-4 rounded-sm bg-yellow-600 text-gray-900 tt600 text-sm mt-6 mr-auto transition ease-in-out duration-200 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-offset-2 focus:ring-offset-gray-900">
                <i class="far fa-play-circle mr-2"></i>
                Play Trailer
            </button>

            <div class="mt-8 h-auto w-full flex flex-row">
                @isset($headerShowProviders['US']['flatrate'])
                    <a href="{{ $headerShowProviders['US']['link'] }}" target="_blank" rel="noopener noreferrer" title="{{ $headerShowProviders['US']['flatrate']['0']['provider_name'] }}">
                        <img src="{{ 'https://image.tmdb.org/t/p/w92/' . $headerShowProviders['US']['flatrate']['0']['logo_path'] }}" alt="" class="h-10 rounded-lg">
                    </a>
                @endisset
            </div>
        </section>

        {{-- Trailer Modal --}}
        <div 
        x-show.transition.scale="isOpen"
        style="background-color: rgba(0, 0, 0, .5);"
        class="fixed w-full h-full top-0 left-0 flex items-center shadow-lg z-50">
            <div class="container mx-auto lg:px-32 rounded-lg">
                <div class="bg-gray-900 rounded" @click.away="isOpen = false">
                    <div class="flex justify-end pr-4 pt-2">
                        <button
                        @click="isOpen = false" 
                        type="button" class="text-3xl text-white leading-none transition ease-linear duration-150 focus:outline-none hover:text-gray-300">&times;</button>
                    </div>
                    <div class="modal-body p-8">
                        <div 
                        style="padding-top: 56.25%;"
                        class="responsive-container overflow-hidden relative">
                        <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full border-none" src="https://www.youtube.com/embed/{{ $headerTrailer[0]['key'] }}" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="my-16 px-32 flex flex-col">
        <h2 class="font-bold uppercase text-sm tracking-wide text-yellow-600 pro700">Popular TV Shows</h2>

        <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 mt-6 gap-8">

            @foreach ($popularShows as $tvshow)

                @if ($loop->index < 10)

                    <x-show-card :tvshow="$tvshow" :genres="$genres" />

                @else
                    
                    @break
                        
                @endif

            @endforeach

        </div>
    </section>

    <section class="my-16 px-32 flex flex-col">
        <h2 class="font-bold uppercase text-sm tracking-wide text-yellow-600 pro700">Now Playing</h2>

        <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 mt-6 gap-8">

            @foreach ($airingToday as $tvshow)

                @if ($loop->index < 10)

                    <x-show-card :tvshow="$tvshow" :genres="$genres" />
                    
                @else
                    
                    @break
                        
                @endif

            @endforeach

        </div>
    </section>
@endsection