@extends('layouts.admin.default')

@section('content')
    <h1>{{ __('availability.create') }}</h1>

    <form method="POST" action="{{ $overviewRoute = route('availabilities') }}">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="dateTime">{{ __('shared.start') }}</label>
                <div class="input-group date">
                    <input name="dateTime" id="dateTime" type="datetime-local" class="form-control dateTime-input" />
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="hours">{{ __('shared.duration') }}</label>
                <select class="form-control" name="hours" id="hours">
                    <option value="1">1 {{ __('shared.hour') }}</option>
                    <option value="2">2 {{ __('shared.hours') }}</option>
                    <option value="3">3 {{ __('shared.hours') }}</option>
                    <option value="4">4 {{ __('shared.hours') }}</option>
                </select>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">{{ __('shared.add') }}</button>
                <a href="{{ $overviewRoute }}">{{ __('shared.cancel') }}</a>
            </div>
        </div>
    </form>

@endsection
