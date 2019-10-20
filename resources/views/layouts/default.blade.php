<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Nikki Schilders - Wellness & Massages</title>

    <meta name="description" content="Nikki Schilders - Wellness & Massages">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<link href="images/favicon.jpg" type="images/x-icon" rel="shortcut icon">--}}
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <header>
        <div class="h-12 bg-teal-600 text-white text-sm flex">
            <div class="flex-grow">
                <div class="ml-16 w-56 h-48 bg-white shadow-md text-teal-900 relative z-10">
                    Logo
                </div>
            </div>
{{--            <svg class="mt-2 mr-2" fill="white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.5 17.311l-1.76-3.397-1.032.505c-1.12.543-3.4-3.91-2.305-4.497l1.042-.513-1.747-3.409-1.053.52c-3.601 1.877 2.117 12.991 5.8 11.308l1.055-.517z"/></svg>--}}
{{--            <svg class="mt-2 mr-2" fill="white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M12 2.02c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 12.55l-5.992-4.57h11.983l-5.991 4.57zm0 1.288l-6-4.629v6.771h12v-6.771l-6 4.629z"/></svg>--}}
        </div>
        <ul class="w-full flex justify-end h-20 text-gray-900 shadow-md">
            <li class="self-center mr-8">
                test 1
            </li>
            <li class="self-center mr-8">
                test 2
            </li>
            <li class="self-center mr-16">
                test 3
            </li>
        </ul>
        <img alt="" src="/images/christin-hume-0MoF-Fe0w0A-unsplash.jpg">
        @if (false === empty($categories))
            <h2 class="mt-24 mb-16 w-full text-center text-4xl">Behandelingen</h2>
            <div class="flex flex-row flex-wrap justify-center">
            @foreach ($categories as $category)
                <div class="sm:w-full lg:w-72 h-72 lg:mx-6 relative">
                    <img alt="" class="object-cover h-72 w-full" src="{{ $category->image }}">
                    <a href="/{{ \Illuminate\Support\Str::slug($category->title) }}" class="w-full absolute bottom-0 mb-2 font-bold text-center text-white">
                        {{ $category->title }}
                    </a>
                </div>
            @endforeach
            </div>
        @endif
    </header>
    <script src="/js/app.js"></script>
</body>
</html>
