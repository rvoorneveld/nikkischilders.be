@extends('layouts.app')

@section('content')
    <h1>
        {{ __('appointment.edit') }}
        {{ $appointment->availability->getDateTimeStart() }}
        {{ $appointment->customer->getName() }}
        {{ $appointment->treatment->getTitle() }}
    </h1>

    <form method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="availability_id">{{ __('availability.title') }}</label>
                <select class="form-control" name="availability_id" id="availability_id">

                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="treatment_id">{{ __('treatment.title') }}</label>
                <select class="form-control" name="treatment_id" id="treatment_id">

                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="customer_id">{{ __('customer.title') }}</label>
                <select class="form-control" name="customer_id" id="customer_id">

                </select>
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
