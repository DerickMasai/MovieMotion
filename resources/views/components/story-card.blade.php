<div class="flex flex-col justify-center items-center">
    <div class="p-0.5 rounded-lg bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
        <div class="h-16 w-16 bg-gray-900 rounded-lg">
            @if ($actor['profile_path'])
                <img src="{{ 'https://image.tmdb.org/t/p/w92/' . $actor['profile_path'] }}" alt="" class="h-full w-full object-cover rounded-lg">
            @else
                
            @endif
        </div>
    </div>
    <span class="mt-4 mx-auto tt400 text-white text-center" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
        {{ $actor['original_name'] }}
    </span>
</div>