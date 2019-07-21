@extends('layouts.admin.default')

@section('content')
    <h1>{{ __('treatment.create') }}</h1>

    <form method="POST" action="{{ $overviewRoute = route('treatments') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">{{ __('shared.title') }}</label>
                <input type="text" class="form-control" name="title" id="title" value="">
            </div>
            <div class="form-group col-md-6">
                <label for="description">{{ __('shared.description') }}</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="price">{{ __('shared.price') }}</label>
                <input type="text" class="form-control" name="price" id="price" value="">
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
