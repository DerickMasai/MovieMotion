{{-- Video Modal --}}
<div 
x-show.transition.scale="isOpen"
style="background-color: rgba(0, 0, 0, .5);"
class="fixed w-full h-full top-0 left-0 flex items-center shadow-lg">
    <div class="container mx-auto lg:px-32 rounded-lg">
        <div class="bg-gray-900 rounded">
            <div class="flex justify-end pr-4 pt-2">
                
                <button type="button" class="menu-close-button list-none ml-auto relative focus:outline-none" @click="isOpen = false">
                    <li class="h-px w-6 bg-white relative transform rotate-45 top-0 left-0"></li>
                    <li class="h-px w-6 bg-white relative transform -rotate-45 top-0 left-0"></li>
                </button>
            </div>
            <div class="modal-body p-8">
                <div 
                style="padding-top: 56.25%;"
                class="responsive-container overflow-hidden relative">
                <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full border-none" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            </div>
        </div>
    </div>
</div>