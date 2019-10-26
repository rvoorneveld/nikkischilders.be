@extends('layouts.default')

@section('hero')
    hero test
@endsection

@section('content')
    <div class="flex flex-row flex-wrap sm:w-full lg:w-3/4 m-auto bg-teal-300 mt-16">
        <div class="sm:w-full lg:w-2/3 bg-blue-500">
            <div class="flex">
                <div class="w-1/3">
                    <img alt="" src="/{{ $category->image }}">
                </div>
                <div class="w-2/3 p-8">
                    <h2 class="text-2xl">{{ $category->title }}</h2>
                    {!! $category->description !!}
                </div>
            </div>
        </div>
        <div class="sm:w-full lg:w-1/3 bg-teal-500">
            @if (false === empty($treatments = $category->treatments))
                @foreach($treatments as $treatment)
                    <div class="flex flex-row w-full">
                        <div class="flex-grow">
                            {{ $treatment->title }}
                        </div>
                        <div>
                            <a href="?id={{ $treatment->encodedId() }}#book">
                                Reserveren
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    @component('components.categories', compact('categories')) @endcomponent
@endsection
