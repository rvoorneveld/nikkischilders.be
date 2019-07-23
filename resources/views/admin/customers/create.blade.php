@extends('layouts.admin.default')

@section('title')
    {{ __('customer.create') }}
@endsection

@section('actions')
    <a href="javascript:addCustomerForm.submit();" class="mr-3 text-sm bg-green-200 text-green-600 py-2 px-3 rounded-lg font-bold">
        {{ __('shared.add') }}
    </a>
    <a href="{{ $route = route('customers') }}" class="mr-3 text-sm bg-red-200 text-red-600 py-2 px-3 rounded-lg font-bold">
        {{ __('shared.cancel') }}
    </a>
@endsection

@section('content')
    <form name="addCustomerForm" method="POST" action="{{ $route }}">
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
    </form>
@endsection
