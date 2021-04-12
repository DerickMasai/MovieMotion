<header class="min-h-96 mt-8 mb-16 mx-32 border-2 border-solid border-pink-500 rounded-xl justify-center flex flex-row z-10 shadow-xl"
x-data="{isOpen: false}"
@keydown.escape.window="isOpen = false"
>
    <div class="secondary-shadow w-1/2 h-full p-16 justify-center flex flex-col z-10">
        <small class="tt300 text-gray-300
        ">
            @foreach ($headerMovie['genre_ids'] as $genre)
                {{$genres->get($genre)}}@if(!$loop->last),@endif
            @endforeach
        </small>
        <a href="{{ route('movies.show', $headerMovie['id']) }}" class="mt-2 tt600 text-white text-5xl">
            {{ $headerMovie['original_title'] }}
        </a>
        <i class="tt300 italic text-sm">
            
        </i>
        <div class="my-2 flex flex-row">
                @if (($headerMovie['vote_average'] * 10) > 70)
                    <span class="tt400 text-green-500 text-sm">
                        <i class="fas fa-star text-yellow-500 mr-1"></i>
                        {{ $headerMovie['vote_average'] * 10 . '%'}}
                    </span>
                @elseif (($headerMovie['vote_average'] * 10) > 50 && ($headerMovie['vote_average'] * 10) < 71)
                    <span class="tt400 text-yellow-500 text-sm">
                        {{ $headerMovie['vote_average'] * 10 . '%'}}
                    </span>
                @else
                    <span class="tt400 text-red-500 text-sm">
                        {{ $headerMovie['vote_average'] * 10 . '%'}}
                    </span>
                @endif
            
            <span class="ml-2 tt500 text-white text-sm">
                {{ Carbon\Carbon::parse($headerMovie['release_date'])->format('d M, Y') }}
            </span>
        </div>
        <p class="tt300 text-gray-200 text-md">
            {{ $headerMovie['overview'] }}
        </p>
        <button 
        @click="isOpen = true" class="shadow-lg pt-3 pb-2 px-4 rounded-sm bg-yellow-600 text-gray-900 tt600 text-sm mt-6 mr-auto transition ease-in-out duration-200 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-offset-2 focus:ring-offset-gray-900">
            <i class="far fa-play-circle mr-2"></i>
            Play Trailer
        </button>

        <div class="mt-8 h-auto w-full flex flex-row">
            @isset($headerMovieProviders['US']['flatrate'])
                <a href="{{ $headerMovieProviders['US']['link'] }}" target="_blank" rel="noopener noreferrer" title="{{ $headerMovieProviders['US']['flatrate']['0']['provider_name'] }}">
                    <img src="{{ 'https://image.tmdb.org/t/p/w92/' . $headerMovieProviders['US']['flatrate']['0']['logo_path'] }}" alt="" class="h-10 rounded-lg">
                </a>
            @endisset
        </div>
    </div>

    <div class="w-1/2 max-h-full flex relative z-0">
        <div class="w-full h-full z-10 rounded-xl rounded-l-none" style="background: url('{{ 'https://image.tmdb.org/t/p/w500/' . $headerMovie['poster_path'] }}') no-repeat center;background-size: cover"></div>
        <div class="w-full h-full z-20 absolute top-0 left-0 rounded-xl rounded-l-none custom-shadow"></div>
    </div>

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