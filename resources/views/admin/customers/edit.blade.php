@extends('layouts.admin.default')

@section('content')
    <h1>{{ __('customer.edit') }} {{ $customer->getName() }}</h1>

    <form method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="lastName">{{ __('shared.lastName') }}</label>
                <input type="text" class="form-control" name="lastName" id="lastName" value="{{ $customer->getLastName() }}">
            </div>
            <div class="form-group col-md-6">
                <label for="firstName">{{ __('shared.firstName') }}</label>
                <input type="text" class="form-control" name="firstName" id="firstName" value="{{ $customer->getFirstName() }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="emailAddress">{{ __('shared.emailAddress') }}</label>
                <input type="text" class="form-control" name="emailAddress" id="emailAddress" value="{{ $customer->getEmailAddress() }}">
            </div>
            <div class="form-group col-md-6">
                <label for="phoneNumber">{{ __('shared.phoneNumber') }}</label>
                <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="{{ $customer->getPhoneNumber() }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">{{ __('shared.save') }}</button>
                <a href="{{ route('customers') }}">{{ __('shared.cancel') }}</a>
            </div>
        </div>
    </form>

@endsection
