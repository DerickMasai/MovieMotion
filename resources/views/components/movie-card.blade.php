<div class="h-auto w-full flex flex-col text-white text-sm group">
    <a href="{{ route('movies.show', $movie['id']) }}" class="h-96 md:h-60 w-full bg-gray-800 transition ease-in-out duration-200 hover:opacity-75">
        @if (!empty($movie['poster_path']))
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="{{ $movie['title'] . ' movie poster' }}" class="w-full h-full rounded-md object-cover ring-1 ring-yellow-500 ring-opacity-40 md:ring-opacity-20 ring-offset-4 md:ring-offset-2 ring-offset-gray-900 transition ease-in-out duration-200 group-hover:ring-opacity-100">
        @else
        <div class="w-full h-full rounded-md ring-1 ring-yellow-500 ring-opacity-40 md:ring-opacity-20 ring-offset-4 md:ring-offset-2 ring-offset-gray-900 transition ease-in-out duration-200 flex group-hover:ring-opacity-100">
            <i class="far fa-image text-gray-600 text-3xl transform scale-150 m-auto"></i>
        </div>
        @endif
    </a>
    <a href="{{ route('movies.show', $movie['id']) }}" class="mt-4 md:mt-3 mb-1 tt500 text-lg md:text-md leading-5">{{ $movie['title'] }}</a>
    <div class="mt-1 tt300 text-sm md:text-xs mb-1"><i class="fas fa-star text-yellow-600"></i> {{ $movie['vote_average'] * 10 . '%' }} <span class="mx-1 text-gray-600 font-light">|</span> {{ Carbon\Carbon::parse($movie['release_date'])->format('d M, Y') }}</div>
    <span class="w-full mt-1 md:mt-0 tt300 text-sm md:text-xs" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
        @foreach ($movie['genre_ids'] as $genre)
            {{$genres->get($genre)}}@if(!$loop->last),@endif
        @endforeach
    </span>
</div>