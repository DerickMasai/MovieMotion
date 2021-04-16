<section class="px-32 mt-16 hidden md:grid grid-cols-6 gap-24">
    @foreach ($headerShowCast['cast'] as $actor)
        {{-- Limit the number of results to 10 --}}
        @if ($loop->index < 6)
            <x-story-card :actor="$actor" />      
        @endif
    @endforeach
    
</section>

<header class="min-h-96 mt-16 mb-8 mx-32 rounded-xl justify-center hidden md:flex md:flex-col lg:flex-row z-10"
    x-data="{isOpen: false}"
    @keydown.escape.window="isOpen = false"
    >
    <a href="{{ route('tv-shows.show', $headerShow['id']) }}" class="w-1/2 flex">
        <div class="w-full h-full z-10 rounded-lg ring-1 ring-pink-500 ring-opacity-40 ring-offset-4 ring-offset-gray-900 transition ease-in-out duration-200 hover:ring-opacity-100" style="background: url('{{ 'https://image.tmdb.org/t/p/w500/' . $headerShow['poster_path'] }}') no-repeat center;background-size: cover"></div>
    </a>

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

{{-- For smaller screens --}}
<section class="px-8 mt-16 grid grid-cols-3 lg:hidden gap-8">
    @foreach ($headerShowCast['cast'] as $actor)

            {{-- Limit the number of results to 10 --}}
            @if ($loop->index < 3)

                <x-story-card :actor="$actor" />

            @else
                
                @break
                    
            @endif

        @endforeach
    
</section>

<header class="mt-8 mx-8 p-2 text-white z-10 shadow-lg border-2 border-solid border-pink-500 ring-2 ring-offset-2 ring-offset-gray-900 ring-pink-500 ring-opacity-20 rounded-xl flex flex-col lg:hidden">
    <a href="{{ route('tv-shows.show', $headerShow['id']) }}" class="h-96 w-full rounded-lg flex bg-gray-800">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $headerShow['poster_path'] }}" alt="{{ $headerShow['name'] }} show poster" class="h-full w-full rounded-lg rounded-b-none object-cover">
    </a>
    <a href="{{ route('tv-shows.show', $headerShow['id']) }}" class="mt-3 tt600 text-white text-2xl">
        {{ $headerShow['name'] }}
    </a>
    <div class="mt-0.5 text-gray-500 flex flex-row">
        <span class="tt400 text-sm">
            Action, Science Fiction
        </span>
        <span class="ml-auto mr-1 flex-shrink-0 tt500 text-sm items-center">
            <i class="fas fa-star text-yellow-500"></i>
            {{ $headerShow['vote_average'] * 10 . '%'}}
        </span>
    </div>
    
    <div class="mt-4 flex flex-row">
        @isset($headerShowProviders['US']['flatrate'])
            <a href="{{ $headerShowProviders['US']['link'] }}" target="_blank" rel="noopener noreferrer" title="{{ $headerShowProviders['US']['flatrate']['0']['provider_name'] }}" class="h-12 w-12">
                <img src="{{ 'https://image.tmdb.org/t/p/w92/' . $headerShowProviders['US']['flatrate']['0']['logo_path'] }}" alt="" class="h-full w-full rounded-bl-lg bg-gray-800">
            </a>
        @endisset
        
        <button 
        @click="isOpen = true" class="ml-auto pt-4 pb-3 px-6 rounded-br-lg bg-yellow-500 shadow-lg text-gray-900 tt600 text-sm transition ease-in-out duration-200 hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:ring-offset-2 focus:ring-offset-gray-900">
            <i class="far fa-play-circle mr-2"></i>
            Play Trailer
        </button>
    </div>
</header>