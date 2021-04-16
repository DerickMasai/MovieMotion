<div class="h-auto w-full flex flex-col text-white text-sm group">
    <a href="{{ route('movies.show', $movie['id']) }}" class="h-96 md:h-52 w-full bg-gray-800 transition ease-in-out duration-300 hover:opacity-75">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="{{ $movie['title'] . ' movie poster' }}" class="w-full h-full rounded-md object-cover ring-1 ring-yellow-500 ring-opacity-20 ring-offset-2 ring-offset-gray-900 transition ease-in-out duration-200 group-hover:ring-opacity-100">
    </a>
    <a href="{{ route('movies.show', $movie['id']) }}" class="tt600 mt-2 mb-1">{{ $movie['title'] }}</a>
    <div class="tt300 text-xs mb-1">
        <i class="fas fa-star text-yellow-600"></i> {{ $movie['vote_average'] * 10 . '%' }} <span class="mx-1 text-gray-600 font-light">|</span> {{ Carbon\Carbon::parse($movie['release_date'])->format('d M, Y') }}
    </div>
    <span class="tt300 text-xs">
        @foreach ($movie['genre_ids'] as $genre)
            {{$genres->get($genre)}}@if(!$loop->last),@endif
        @endforeach
    </span>
</div>