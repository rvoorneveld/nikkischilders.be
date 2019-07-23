@extends('layouts.admin.default')

@section('title')
    {{ __('appointment.create') }}
@endsection

@section('actions')
    <a href="javascript:addAppointmentForm.submit();" class="mr-3 text-sm bg-green-200 text-green-600 py-2 px-3 rounded-lg font-bold">
        {{ __('shared.add') }}
    </a>
    <a href="{{ $route = route('appointments') }}" class="mr-3 text-sm bg-red-200 text-red-600 py-2 px-3 rounded-lg font-bold">
        {{ __('shared.cancel') }}
    </a>
@endsection

@section('content')
    <form name="addAppointmentForm" method="POST" action="{{ $route }}">
        @csrf
        <div>
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
    </form>
@endsection
