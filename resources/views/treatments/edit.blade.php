@extends('layouts.app')

@section('content')
    <h1>{{ __('treatment.edit') }} {{ $treatment->getTitle() }}</h1>

    <form method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">{{ __('shared.title') }}</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $treatment->getTitle() }}">
            </div>
            <div class="form-group col-md-6">
                <label for="description">{{ __('shared.description') }}</label>
                <textarea class="form-control" name="description" id="description">{{ $treatment->getDescription() }}</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="price">{{ __('shared.price') }}</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ $treatment->getPrice() }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">{{ __('shared.save') }}</button>
                <a href="{{ route('treatments') }}">{{ __('shared.cancel') }}</a>
            </div>
        </div>
    </form>

@endsection
