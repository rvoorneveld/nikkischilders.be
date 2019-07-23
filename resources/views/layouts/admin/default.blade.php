<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/admin/app.js') }}" defer></script>
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="flex">
        <div class="bg-gray-900 w-64 h-screen">
            <a class="text-xl block text-center text-gray-200 my-6" href="{{ url('/appointments') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            @auth
            <ul class="navigation mx-6 text-gray-500">
                <li class="py-3 border-b border-gray-800">
                    <a class="flex hover:text-gray-200" href="{{ route('appointments') }}">
                        <span class="flex-grow">{{ __('appointment.title') }}</span>
                        <span class="self-center"><svg class="svg svg-navigation" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg></span>
                    </a>
                </li>
                <li class="py-3 border-b border-gray-800">
                    <a class="flex hover:text-gray-200" href="{{ route('customers') }}">
                        <span class="flex-grow">{{ __('customer.title') }}</span>
                        <span class="self-center"><svg class="svg svg-navigation" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg></span>
                    </a>
                </li>
                <li class="py-3 border-b border-gray-800">
                    <a class="flex hover:text-gray-200" href="{{ route('treatments') }}">
                        <span class="flex-grow">{{ __('treatment.title') }}</span>
                        <span class="self-center"><svg class="svg svg-navigation" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg></span>
                    </a>
                </li>
                <li class="py-3 border-b border-gray-800">
                    <a class="flex hover:text-gray-200" href="{{ route('availabilities') }}">
                        <span class="flex-grow">{{ __('availability.title') }}</span>
                        <span class="self-center"><svg class="svg svg-navigation" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg></span>
                    </a>
                </li>
            </ul>
            @endauth
        </div>
        <div class="w-full">
            <div class="h-16 border-b flex px-6">
                <div class="flex self-center flex-grow">
                    <h1 class="self-center text-3xl">
                        <span class="pr-6 border-r">@yield('title')</span>
                    </h1>
                    <div class="pl-6 self-center">
                        @yield('actions')
                    </div>
                </div>
                <div id="script-toggle-button" class="relative self-center text-sm hover:bg-gray-200 text-gray-500 rounded-lg px-3 py-2">
                    @auth
                    Hi, {{ $name = Auth::user()->name }}
                    <span class="ml-3 bg-green-200 text-green-400 font-bold text-lg py-1 px-3 rounded-lg text-uppercase font-bold">
                        {{ substr($name, 0, 1) }}
                    </span>
{{--                        <a--}}
{{--                            href="#"--}}
{{--                            class="mr-3 text-sm bg-orange-200 text-orange-600 py-2 px-3 rounded-lg font-bold"--}}
{{--                            onclick="e.preventDefault(); document.getElementById('logout-form').submit();"--}}
{{--                        >--}}
{{--                            {{ __('Logout') }}--}}
{{--                        </a>--}}

                    @endauth
                </div>
            </div>
            @yield('content')

{{--            @if ($errors->any())--}}
{{--                <div>--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @yield('content')--}}
        </div>
    </div>
</body>
</html>
