<div class="mr-auto md:mr-0 md:my-auto relative" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <li>
        <input 
        wire:model.debounce.500ms="search" 
        type="text" 
        class="input-search-lg w-64 py-1 pr-3 pl-8 bg-gray-700 rounded-3xl capitalize focus:outline-none" 
        placeholder="Search" 
        x-ref="search"
        @keydown.window = "
            if (event.keyCode == 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false">
        <i class="fas fa-search text-white text-opacity-10 absolute top-1/2 transform -translate-y-1/2 left-3 text-xs"></i>
        <div wire:loading class="spinner top-0 mt-3.5 mr-4 right-0 border-black text-xs"></div>
    </li>

    {{-- Hide search results UI until a search term is entered --}}
    @if (strlen($search) >= 2)
        
        <div 
        class="search-results w-full mt-2 absolute bg-gray-700 z-30" 
        x-show.transition.scale="isOpen">
            <ul class="list-none flex flex-col">
                {{-- Check if there are results --}}
                @if ($searchResults->count() > 0)
                    
                    @foreach ($searchResults as $result)
                        <li class="transition ease-in-out duration-200 hover:bg-gray-600">
                            <a 
                            href="{{ route('tv-shows.show', $result['id']) }}" class="grid grid-cols-12 gap-x-2 py-3 px-3 border-b border-solid border-gray-600 pro400 text-gray-300 text-sm items-center transition ease-in-out duration-200 hover:text-white"
                            @if ($loop->last)
                                @keydown.tab="isOpen = false"
                            @endif>
                                
                                <div class="h-10 w-full col-start-1 col-end-3 bg-gray-600 mr-2">
                                    {{-- Check if poster exists --}}
                                    @if ($result['poster_path'])

                                        <img src="{{ 'https://image.tmdb.org/t/p/w92/' . $result['poster_path'] }}" alt="{{ $result['name'] . ' movie poster' }}" class="w-full h-full object-cover">

                                    @else
                                    
                                        <img src="https://via.placeholder.com/58x75" alt="Placeholder image via Placeholder.com" class="w-full h-full object-cover">

                                    @endif
                                </div>

                                

                                <div class="col-start-3 col-end-13 capitalize flex flex-col">
                                    <h5>
                                        {{ $result['name'] }}
                                    </h5>
                                    <small class="pro300 text-white text-xs">
                                        {{ Carbon\Carbon::parse($result['first_air_date'])->format('d M Y') }}
                                    </small>
                                </div>
                            </a>
                        </li>
                    @endforeach

                @else

                    <li class="py-2">
                        <h5 class="pro400 text-gray-300 text-sm py-2 px-3">
                            No results found for "{{ $search }}"
                        </h5>
                    </li>

                @endif
            </ul>
        </div>

    @endif
</div>