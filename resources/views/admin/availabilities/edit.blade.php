@extends('layouts.admin.default')

@section('content')
    <h1>{{ __('availability.edit') }} #{{ $availability->id }}</h1>

    <form method="POST">
        @csrf
        @method('PUT')

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

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">{{ __('shared.save') }}</button>
                <a href="{{ route('availabilities') }}">{{ __('shared.cancel') }}</a>
            </div>
        </div>
    </form>

@endsection
