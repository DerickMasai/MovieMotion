<a href="{{ route('movies.index') }}" class="mt-1.5 logo tt700 text-lg font-bold text-white flex flex-row">
    <i class="fas fa-video mt-0.5 mr-1 text-yellow-600"></i>
    <h1 class="logo"> Movie<span>Motion</span></h1>
</a>

<ul class="tt300 hidden mt-2 md:mt-0 list-none text-white text-sm md:ml-16 md:flex md:flex-row md:justify-items-center md:items-center">
    <li class="mr-auto">
        <a href="{{ route('movies.index') }}" class="pro300">Movies</a>
    </li>
    <li class="mr-auto md:mr-0 md:ml-6">
        <a href="{{ route('tv-shows.index') }}" class="pro300">TV Shows</a>
    </li>
</ul>

<ul class="tt300 md:ml-auto hidden mt-2 md:mt-0 md:flex md:flex-row list-none text-sm text-white relative">
    <livewire:shows-search-dropdown>
</ul>

{{-- Responsive Menu trigger --}}
<button type="button" class="menu-button mt-2 list-none flex flex-col ml-auto md:hidden focus:outline-none" @click="responsiveNav = true">
    <li class="h-px w-8 bg-white"></li>
    <li class="my-1.5 ml-auto h-px w-6 bg-white"></li>
    <li class="ml-auto h-px w-4 bg-white"></li>
</button>

{{-- Responsive Nav - For smaller screens --}}
<section class="fullscreen-menu px-20 py-5 h-screen w-full fixed top-0 left-0 bg-gray-900 bg-opacity-90 text-white list-none flex flex-col z-50 pointer-events-none opacity-0 transition ease-in duration-300" x-show="responsiveNav">
    <div class="m-0 flex flex-row">
        <ul class="tt300 flex flex-row list-none text-sm text-white justify-center items-center">
            <li class="">
                <button type="button" class="h-8 w-8 rounded-full p-0 border-none bg-gray-700 flex focus:outline-none">
                    <i class="fas fa-user text-gray-900 m-auto"></i>
                </button>
            </li>
            <li class="ml-2 my-auto relative">
                <input type="text" class="w-64 py-1 pl-3 pr-8 bg-gray-700 rounded-3xl focus:outline-none" placeholder="Search">
                <i class="fas fa-search text-gray-900 absolute top-1/4 -translate-y-1/2 right-3 text-xs"></i>
            </li>
        </ul>
    
        <button type="button" class="menu-close-button list-none ml-auto relative focus:outline-none">
            <li class="h-px w-6 bg-white relative transform rotate-45 top-0 left-0"></li>
            <li class="h-px w-6 bg-white relative transform -rotate-45 top-0 left-0"></li>
        </button>
    </div>
    
    <ul class="tt200 list-none text-white text-2xl mx-auto mt-20 text-center flex flex-col">
        <li class="mb-8">
            <a href="#" class="text-center flex flex-row"><i class="fas fa-film text-yellow-600 text-xs mt-1 mr-2"></i> Movies</a>
        </li>
        <li class="mb-8">
            <a href="#" class="text-center flex flex-row"><i class="fas fa-tv mt-1 mr-2 text-white text-xs"></i> TV Shows</a>
        </li>
        <li>
            <a href="#" class="text-center flex flex-row"><i class="fas fa-user-friends mt-1.5 mr-2 text-white text-xs"></i> Actors</a>
        </li>
    </ul>

    <small class="mt-auto mx-auto pro300 text-gray-300">&copy; <script>document.write(new Date().getFullYear());</script> MovieApp. Made with ❤️ by <a href="https://derickmasai.com">Derick Masai</a>. All Rights Reserved.</small>
</section>