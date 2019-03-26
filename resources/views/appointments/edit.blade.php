@extends('layouts.app')

@section('content')
    <h1>{{ __('appointment.edit') }}</h1>

    <form method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">{{ __('shared.title') }}</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $appointment->getTitle() }}">
            </div>
            <div class="form-group col-md-6">
                <label for="description">{{ __('shared.description') }}</label>
                <textarea class="form-control" name="description" id="description">{{ $appointment->getDescription() }}</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="price">{{ __('shared.price') }}</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ $appointment->getPrice() }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">{{ __('shared.save') }}</button>
                <a href="{{ route('appointments') }}">{{ __('shared.cancel') }}</a>
            </div>
        </div>
    </form>

@endsection
