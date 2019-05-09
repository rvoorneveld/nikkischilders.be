@extends('layouts.app')

@section('content')
    <h1>{{ __('availability.edit') }} #{{ $availability->id }}</h1>

    <form method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">{{ __('shared.save') }}</button>
                <a href="{{ route('availabilities') }}">{{ __('shared.cancel') }}</a>
            </div>
        </div>
    </form>

@endsection
