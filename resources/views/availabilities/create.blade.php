@extends('layouts.app')

@section('content')
    <h1>{{ __('availability.create') }}</h1>

    <form method="POST" action="{{ $overviewRoute = route('availabilities') }}">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="dateTimePicker">{{ __('availability.start') }}</label>
                <div class="input-group date" id="dateTimePicker" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#dateTimePicker"/>
                    <div class="input-group-append" data-target="#dateTimePicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="duration">{{ __('availability.duration') }}</label>
                <select class="form-control" name="duration" id="duration">
                    @for ($i = 1; $i <= $totalHoursPerDay; $i++)
                        <option value="{{ $i }}">
                            {{ $i }} {{ strtolower(__('availability.hour'.(1 === $i ? '' : 's'))) }}
                        </option>
                    @endfor
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
