<div id="{{ $name }}" class="overlay fixed top-0 right-0 bottom-0 left-0 flex items-center justify-center" style="background-color: rgba(0, 0, 0, .75)">
    <a href="#" class="absolute w-full h-full cursor-default"></a>
    <div class="relative w-full h-full md:h-auto md:w-3/4 lg:w-1/2 max-w-3xl p-6 lg:p-12 bg-blue-900">
        {{ $slot }}
        <a class="script-modal-overlay-button absolute top-0 right-0 mr-3 text-3xl font-extrabold no-underline text-white" href="#">&times;</a>
    </div>
</div>
