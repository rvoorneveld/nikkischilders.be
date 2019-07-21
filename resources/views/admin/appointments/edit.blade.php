@extends('layouts.admin.default')

@section('content')
    <h1>{{ __('appointment.edit') }} #{{ $appointment->id }}</h1>

    <form method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">{{ __('shared.save') }}</button>
                <a href="{{ route('appointments') }}">{{ __('shared.cancel') }}</a>
            </div>
        </div>
    </form>

@endsection
