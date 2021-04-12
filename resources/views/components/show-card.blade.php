<div class="h-auto w-full flex flex-col text-white text-sm">
    <a href="{{ route('tv-shows.index') . '/' . $tvshow['id'] }}" class="h-52 w-full bg-gray-800 transition ease-in-out duration-300 hover:opacity-75 ">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $tvshow['poster_path'] }}" alt="{{ $tvshow['name'] . ' movie poster' }}" class="w-full h-full object-cover">
    </a>
    <a href="{{ route('tv-shows.index') . '/' . $tvshow['id'] }}" class="tt600 mt-2 mb-1">{{ $tvshow['name'] }}</a>
    <div class="tt300 text-xs mb-1"><i class="fas fa-star text-yellow-600"></i> {{ $tvshow['vote_average'] * 10 . '%' }} <span class="mx-1 text-gray-600 font-light">|</span> {{ Carbon\Carbon::parse($tvshow['first_air_date'])->format('d M, Y') }}</div>
    <span class="tt300 text-xs">
        @foreach ($tvshow['genre_ids'] as $genre)
            {{$genres->get($genre)}}@if(!$loop->last),@endif
        @endforeach
    </span>
</div>