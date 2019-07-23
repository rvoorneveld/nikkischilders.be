@extends('layouts.admin.default')

@section('title')
    {{ __('customer.edit') }} {{ $customer->getName() }}
@endsection

@section('actions')
    <a href="javascript:editCustomersForm.submit();" class="mr-3 text-sm bg-green-200 text-green-600 py-2 px-3 rounded-lg font-bold">
        {{ __('shared.save') }}
    </a>
    <a href="{{ route('customers') }}" class="mr-3 text-sm bg-red-200 text-red-600 py-2 px-3 rounded-lg font-bold">
        {{ __('shared.cancel') }}
    </a>
@endsection

@section('content')
    <form name="editCustomersForm" method="POST">
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
    </form>
@endsection
