@extends('layouts.admin.authenticate')

@section('title')
    {{ __('Login') }}
@endsection

@section('content')
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="p-8 border-t-8 bg-white mb-6 rounded-lg shadow-lg border-green-200">
                <div class="mb-4">
                    <label for="email" class="text-gray-700 block mb-2">{{ __('E-Mail Address') }}</label>
                    @if ($errors->has('email'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-2" role="alert">
                            <p>{{ $errors->first('email') }}</p>
                        </div>
                    @endif
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                </div>
                <div>
                    <label for="password" class="text-gray-700 block mb-2">{{ __('Password') }}</label>
                    @if ($errors->has('password'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-2" role="alert">
                            <p>{{ $errors->first('password') }}</p>
                        </div>
                    @endif
                    <input id="password" type="password" name="password" required class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                </div>
                <div class="flex mt-6">
                    <div class="self-center flex-grow">
                        <button type="submit" class="text-sm bg-green-200 text-green-600 py-2 px-3 rounded-lg font-bold">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <a class="text-bold self-center text-sm hover:underline" href="/password/reset">{{ __('Forgot Your Password?') }}</a>
                </div>
            </div>
        </form>
@endsection
