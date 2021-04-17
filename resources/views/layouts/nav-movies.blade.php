<nav class="w-full px-8 md:px-16 lg:px-32 py-5 m-0 border-b border-solid border-gray-800 flex flex-row" x-data="{responsiveNav : false}">

    <a href="{{ route('movies.index') }}" class="mt-1.5 logo tt700 text-lg font-bold text-white flex flex-row">
        <i class="fas fa-video mt-0.5 mr-1 text-yellow-600"></i>
        <h1 class="logo">Movie<span>Motion</span></h1>
    </a>

    <ul class="tt300 hidden mt-2 md:mt-0 list-none text-white text-sm md:ml-16 lg:flex flex-row md:justify-items-center md:items-center">
        <li class="mr-auto">
            <a href="{{ route('movies.index') }}" class="pro300">Movies</a>
        </li>
        <li class="mr-auto md:mr-0 md:ml-6">
            <a href="{{ route('tv-shows.index') }}" class="pro300">TV Shows</a>
        </li>
    </ul>

    <ul class="tt300 md:ml-auto hidden mt-2 md:mt-0 lg:flex md:flex-row list-none text-sm text-white relative">
        <livewire:search-dropdown>
    </ul>

    {{-- Responsive Menu trigger --}}
    <button type="button" class="menu-button mt-2 list-none flex flex-col ml-auto lg:hidden focus:outline-none" @click="responsiveNav = true">
        <li class="h-px w-8 bg-white"></li>
        <li class="my-1.5 ml-auto h-px w-6 bg-white"></li>
        <li class="ml-auto h-px w-4 bg-white"></li>
    </button>

    {{-- Responsive Nav - For smaller screens --}}
    <section class="fullscreen-menu px-8 py-5 h-screen w-full fixed top-0 left-0 bg-gray-900  bg-opacity-95 text-white list-none flex flex-col z-50 transition ease-in duration-300" x-show.transition.origin.top.right="responsiveNav">
        <div class="w-full m-0 flex flex-row">
            <ul class="tt300 mr-auto flex flex-row list-none text-sm text-white">
                <livewire:search-dropdown>
            </ul>
        
            <button type="button" class="menu-close-button list-none ml-auto relative focus:outline-none" @click="responsiveNav = false">
                <li class="h-px w-6 bg-white relative transform rotate-45 top-0 left-0"></li>
                <li class="h-px w-6 bg-white relative transform -rotate-45 top-0 left-0"></li>
            </button>
        </div>
        
        <ul class="tt200 list-none text-white text-2xl md:text-4xl mx-auto mt-20 md:mt-32 text-center flex flex-col">
            <li class="mb-8 md:mb-16 flex justify-center">
                <a href="{{ route('movies.index') }}" class="border-b-2 border-solid border-yellow-500">
                    Movies
                </a>
            </li>
            <li class="flex justify-center">
                <a href="{{ route('tv-shows.index') }}">
                    TV Shows
                </a>
            </li>
        </ul>

        <small class="w-full text-center mt-auto mx-auto pro300 text-gray-300">&copy; <script>document.write(new Date().getFullYear());</script> MovieApp. Made with <i class="fas fa-heart text-green-dm"></i> by <a href="https://derickmasai.com">Derick Masai</a>. All Rights Reserved.</small>
    </section>
</nav>