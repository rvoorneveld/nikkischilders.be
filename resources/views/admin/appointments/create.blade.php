@extends('layouts.admin.default')

@section('content')
    <h1>{{ __('appointment.create') }}</h1>

    <form method="POST" action="{{ $overviewRoute = route('appointments') }}">
        @csrf
        <div class="form-row">
            <!--<div class="form-group col-md-6">
                <label for="availability_id">{{ __('shared.appointment') }}</label>
                <select class="form-control" name="availability_id" id="availability_id">

                </select>
            </div>-->
            <div class="form-group col-md-6">
                <label for="treatment_id">{{ __('shared.treatment') }}</label>
                <select class="form-control" name="treatment_id" id="treatment_id">

                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="customer_id">{{ __('shared.customer') }}</label>
                <select class="form-control" name="customer_id" id="customer_id">

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
