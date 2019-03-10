@extends('layouts.app')

@section('content')
    <h1>{{ __('customer.create') }}</h1>

    <form method="POST" action="{{ $customersOverviewRoute = route('customers') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="lastName">{{ __('shared.lastName') }}</label>
                <input type="text" class="form-control" name="lastName" id="lastName" value="">
            </div>
            <div class="form-group col-md-6">
                <label for="firstName">{{ __('shared.firstName') }}</label>
                <input type="text" class="form-control" name="firstName" id="firstName" value="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="emailAddress">{{ __('shared.emailAddress') }}</label>
                <input type="text" class="form-control" name="emailAddress" id="emailAddress" value="">
            </div>
            <div class="form-group col-md-6">
                <label for="phoneNumber">{{ __('shared.phoneNumber') }}</label>
                <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">{{ __('shared.add') }}</button>
                <a href="{{ $customersOverviewRoute }}">{{ __('shared.cancel') }}</a>
            </div>
        </div>
    </form>

@endsection
