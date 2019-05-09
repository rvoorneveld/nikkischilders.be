@extends('layouts.app')

@section('content')
    <h1>{{ __('availability.create') }}</h1>

    <form method="POST" action="{{ $overviewRoute = route('availabilities') }}">
        @csrf

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">{{ __('shared.add') }}</button>
                <a href="{{ $overviewRoute }}">{{ __('shared.cancel') }}</a>
            </div>
        </div>
    </form>

@endsection
