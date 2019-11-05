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
                    <a href="/">Logo</a>
                </div>
            </div>
{{--            <svg class="mt-2 mr-2" fill="white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.5 17.311l-1.76-3.397-1.032.505c-1.12.543-3.4-3.91-2.305-4.497l1.042-.513-1.747-3.409-1.053.52c-3.601 1.877 2.117 12.991 5.8 11.308l1.055-.517z"/></svg>--}}
{{--            <svg class="mt-2 mr-2" fill="white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M12 2.02c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 12.55l-5.992-4.57h11.983l-5.991 4.57zm0 1.288l-6-4.629v6.771h12v-6.771l-6 4.629z"/></svg>--}}
        </div>
        <ul class="w-full flex justify-end h-20 text-gray-900 shadow-md">
            @foreach ($categories as $category)
            <li class="self-center mr-8 border-b-2 border-white hover:border-teal-600">
                <a href="{{ $category->path() }}">{{ $category->title }}</a>
            </li>
            @endforeach
        </ul>
        @yield('hero')
    </header>
    @yield('content')
    @component('modal', ['name' => 'book',])
        <h1 class="text-white text-2xl sm:text-3xl mb-2 lg:mb-6">Reserveer een behandeling</h1>
        @if(false === empty($errors->all()))
            <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-700 px-4 py-3 shadow-md mt-2 mb-4" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="rounded-full border-2 border-red-500 fill-current h-6 w-6 text-red-500 mr-4 mt-2" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold">Reservering niet geslaagd</p>
                        <p class="text-sm">Vul alle velden in om uw reservering te maken.</p>
                    </div>
                </div>
            </div>
        @endif
        <form class="w-full" method="post" action="/">
            {{ csrf_field() }}
            <div class="flex flex-wrap -mx-3 lg:mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-1" for="firstName">
                        Voornaam
                    </label>
                    <input name="firstName" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="firstName" type="text" value="{{ old('firstName') }}">
                    @if($errors->first($key ='firstName'))
                        <p class="text-red-400 text-sm italic -mt-2 mb-2">{{ $errors->first($key) }}</p>
                    @endif
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-1" for="lastName">
                        Achternaam
                    </label>
                    <input name="lastName" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="lastName" type="text" value="{{ old('lastName') }}">
                    @if($errors->first($key = 'lastName'))
                        <p class="text-red-400 text-sm italic -mt-2 mb-2">{{ $errors->first($key) }}</p>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 lg:mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-1" for="emailAddress">
                        E-mailadres
                    </label>
                    <input name="emailAddress" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="emailAddress" type="email" value="{{ old('emailAddress') }}">
                    @if($errors->first($key = 'emailAddress'))
                        <p class="text-red-400 text-sm italic -mt-2 mb-2">{{ $errors->first($key) }}</p>
                    @endif
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-1" for="phoneNumber">
                        Telefoonnummer
                    </label>
                    <input name="phoneNumber" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phoneNumber" type="tel" value="{{ old('phoneNumber') }}">
                    @if($errors->first($key = 'phoneNumber'))
                        <p class="text-red-400 text-sm italic -mt-2 mb-2">{{ $errors->first($key) }}</p>
                    @endif
                </div>
            </div>

            <div id="vue-calendar">

            </div>

            <div class="w-full text-center mt-3 lg:mb-6">
                <input class="cursor-pointer rounded font-bold text-white bg-teal-800 mx-auto px-12 py-4 hover:bg-teal-400" type="submit" value="Reserveren">
            </div>
        </form>
    @endcomponent
    <script src="/js/app.js"></script>
</body>
</html>
