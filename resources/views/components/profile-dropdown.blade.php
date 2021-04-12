<div class="mr-auto mt-2 md:mt-0 md:mr-0 md:ml-3 md:my-auto" x-data="{ isOpen: false }" @click.away="isOpen = false">
    <li>
        <button @click="isOpen = true" type="button" class="h-8 w-8 rounded-full p-0 border-none bg-gray-700 flex focus:outline-none">
            <i class="fas fa-user text-gray-900 m-auto"></i>
        </button>
    </li>

    <div class="w-auto mt-2 absolute right-0 bg-gray-700 z-30" 
    x-show.transition.scale="isOpen">
            <ul class="list-none flex flex-col">
                <li class="transition ease-in-out duration-200 hover:bg-gray-600">
                    <a 
                    href="#"
                    class="flex flex-row py-3 pl-6 pr-12 border-b border-solid border-gray-600 pro400 text-gray-300 text-sm items-center transition ease-in-out duration-200 hover:text-white">
                        <i class="fas fa-user-alt text-gray-300 text-xs mr-2"></i>
                        Profile
                    </a>
                </li>
                <li class="transition ease-in-out duration-200 hover:bg-gray-600">
                    <a 
                    href="#"
                    class="flex flex-row py-3 pl-6 pr-12 border-b border-solid border-gray-600 pro400 text-gray-300 text-sm items-center transition ease-in-out duration-200 hover:text-white">
                        <i class="fas fa-clock text-gray-300 text-xs mr-2"></i>
                        My Watchlist
                    </a>
                </li>
                <li class="transition ease-in-out duration-200 hover:bg-gray-600">
                    <a 
                    href="#"
                    class="flex flex-row py-3 pl-6 pr-12 border-b border-solid border-gray-600 pro400 text-gray-300 text-sm items-center transition ease-in-out duration-200 hover:text-white">
                        <i class="fas fa-cog text-gray-300 text-xs mr-2"></i>
                        Settings
                    </a>
                </li>
                <li class="transition ease-in-out duration-200 hover:bg-gray-600">
                    <a 
                    href="#"
                    class="flex flex-row py-3 pl-6 pr-12 border-b border-solid border-gray-600 pro400 text-gray-300 text-sm items-center transition ease-in-out duration-200 hover:text-white">
                        <i class="fas fa-lock text-gray-300 text-xs mr-2"></i>
                        Log Out
                    </a>
                </li>
            </ul>
    </div>    
</div>