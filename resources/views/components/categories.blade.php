@if (false === empty($categories))
    <h2 class="mt-24 mb-16 w-full text-center text-4xl">Behandelingen</h2>
    <div class="flex flex-row flex-wrap justify-center">
        @foreach ($categories as $category)
            <div class="sm:w-full lg:w-72 h-72 lg:mx-6 relative">
                <img alt="" class="object-cover h-72 w-full" src="/{{ $category->image }}">
                <a href="{{ $category->path() }}" class="w-full absolute bottom-0 mb-2 font-bold text-center text-white">
                    {{ $category->title }}
                </a>
            </div>
        @endforeach
    </div>
@endif
