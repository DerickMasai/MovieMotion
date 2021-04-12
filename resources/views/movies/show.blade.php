@extends('layouts.app')

@section('content')

    <section class="px-10 md:px-24 lg:px-32 pb-10 mt-16 grid grid-cols-1 md:grid-cols-3 md:gap-x-12 border-b border-solid border-gray-800">
        <div class="col-start-1 h-96 w-full mb-8 md:mb-0">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="{{ $movie['title'] . ' movie poster' }}" class="w-full h-full object-cover">
        </div>
        <div class="md:col-start-2 md:col-end-4 h-full w-full flex flex-col">
            <h2 class="tt700 text-white text-4xl">{{ $movie['title'] }}</h2>

            <div class="tt300 text-sm text-white mt-1 flex flex-row">
                <i class="fas fa-star text-yellow-600 mr-1"></i>
                <span>
                    {{ $movie['vote_average'] * 10 . '%' }}
                </span>
                <span class="mx-2 my-auto text-gray-600 font-light">|</span>
                <span>
                    {{ Carbon\Carbon::parse($movie['release_date'])->format('d M, Y') }}
                </span>
                <span class="mx-2 my-auto text-gray-600 font-light">|</span>
                <span>
                    @foreach ($movie['genres'] as $genre)
                        {{$genre['name']}}@if(!$loop->last), @else @break @endif
                    @endforeach
                </span>
            </div>

            <p class="tt300 text-sm text-white mt-4">
                {{ $movie['overview'] }}
            </p>

            <h5 class="tt500 text-md text-white mt-8 mb-2">
                Featured Crew
            </h5>
            
            <div class="grid grid-cols-3">
                @foreach ($movie['credits']['crew'] as $crew)
                    {{-- Conditional used to display 3 wanted results only --}}
                    @if ($loop->index < 3)
                        <div class="flex flex-col text-sm">
                            <p class="tt500 text-white">
                                {{ $crew['name'] }}
                            </p>
                            <span class="tt300 text-gray-300 ">
                                {{ $crew['job'] }}
                            </span>
                        </div>
                    @else
                    
                        @break
                    @endif
                @endforeach
            </div>

            <div
            x-data="{isOpen: false}"
            @keydown.escape.window="isOpen = false">
                <button 
                @click="isOpen = true"
                target="_blank" class="pt-3 pb-2 px-4 rounded-sm bg-yellow-600 text-gray-900 tt600 text-sm mt-6 mr-auto transition ease-in-out duration-200 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-offset-2 focus:ring-offset-gray-900">
                    <i class="far fa-play-circle mr-2"></i>
                    Play Trailer
                </button>
                
                {{-- Video Modal --}}
                <x-video-modal :movie="$movie" />
            </div>
        </div>
    </section>

    <section class="px-10 md:px-24 lg:px-32 mt-8 pb-10 border-b border-solid border-gray-800 flex flex-col">
        <h3 class="tt700 text-white text-3xl mb-6">
            Cast
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-x-8">
            @foreach ($movie['credits']['cast'] as $cast)
                @if ($loop->index < 5)
                    <div class="flex flex-col">
                        <div class="h-52 w-full">
                            @if ($cast['profile_path'])
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $cast['profile_path'] }}" alt="{{ $cast['name'] . ' portrait' }}" class="w-full h-full object-cover">
                            @else
                                <img src="https://via.placeholder.com/300x250?text=300x250+MPU" alt="{{ $cast['name'] . ' placeholder image' }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <h5 class="mt-2 text-white text-lg tt500">
                            {{ $cast['name'] }}
                        </h5>
                        <span class="pro300 text-gray-200 text-sm">
                            as "{{ $cast['character'] }}"
                        </span>
                    </div>
                @else
                
                    @break

                @endif
            @endforeach
        </div>
    </section>

    <section class="px-10 md:px-24 lg:px-32 mt-8 pb-10 flex flex-col">
        <h3 class="tt700 text-white text-3xl mb-6">
            Images
        </h3>

        <div
        x-data="{ isOpen: false, image: '', alt: '' }"
        @keydown.escape.window="isOpen = false"
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8">
            @foreach ($movie['images']['backdrops'] as $image)
                @if ($loop->index < 3)
                    <div class="flex flex-col">
                        <a
                        @click.prevent="
                            isOpen = true 
                            image='{{ 'https://image.tmdb.org/t/p/original/' . $image['file_path'] }}' 
                            alt='{{ $movie['title'] . ' screenshot' }}'" href="#" class="h-48 w-full">
                            @if ($image['file_path'])
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt="{{ $movie['title'] . ' screenshot' }}" class="w-full h-full object-cover">
                            @else
                                <img src="https://via.placeholder.com/300x250?text=300x250+MPU" alt="Image placeholder" class="w-full h-full object-cover">
                            @endif
                        </a>
                    </div>
                @else
                
                    @break
                    
                @endif
            @endforeach

            {{-- Image Modal --}}
            <x-image-modal />
        </div>
    </section>
@endsection