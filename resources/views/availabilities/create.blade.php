@extends('layouts.app')

@section('content')
    <h1>{{ __('availability.create') }}</h1>

    <form method="POST" action="{{ $overviewRoute = route('availabilities') }}">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="dateTime">{{ __('shared.start') }}</label>
                <div class="input-group date" id="dateTime" data-target-input="nearest">
                    <input type="text" class="form-control dateTime-input" data-target="#dateTime"/>
                    <div class="input-group-append" data-target="#dateTime" data-toggle="dateTime">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="minutes">{{ __('shared.duration') }}</label>
                <select class="form-control" name="minutes" id="minutes">
                    <option value="30">30 {{ __('shared.minutes') }}</option>
                    <option value="60">1 {{ __('shared.hour') }}</option>
                    <option value="90">90 {{ __('shared.minutes') }}</option>
                    <option value="120">2 {{ __('shared.hours') }}</option>
                    <option value="150">150 {{ __('shared.minutes') }}</option>
                    <option value="180">3 {{ __('shared.hours') }}</option>
                    <option value="210">210 {{ __('shared.minutes') }}</option>
                    <option value="240">4 {{ __('shared.hours') }}</option>
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
