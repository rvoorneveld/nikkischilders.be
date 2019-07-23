@extends('layouts.admin.default')

@section('title')
    {{ __('treatment.edit') }} {{ $treatment->getTitle() }}
@endsection

@section('actions')
    <a href="javascript:editTreatmentForm.submit();" class="mr-3 text-sm bg-green-200 text-green-600 py-2 px-3 rounded-lg font-bold">
        {{ __('shared.save') }}
    </a>
    <a href="{{ route('treatments') }}" class="mr-3 text-sm bg-red-200 text-red-600 py-2 px-3 rounded-lg font-bold">
        {{ __('shared.cancel') }}
    </a>
@endsection

@section('content')
    <form name="editTreatmentForm" method="POST">
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
    </form>
@endsection
