@extends('layouts.app')

@section('content')
    <h1>Edit customer {{ $customer->getName() }}</h1>

    <form method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastName" id="lastName" value="{{ $customer->getLastName() }}">
            </div>
            <div class="form-group col-md-6">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" value="{{ $customer->getFirstName() }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="emailAddress">Email address</label>
                <input type="text" class="form-control" name="emailAddress" id="emailAddress" value="{{ $customer->getEmailAddress() }}">
            </div>
            <div class="form-group col-md-6">
                <label for="phoneNumber">Phone number</label>
                <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="{{ $customer->getPhoneNumber() }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('customers') }}">Cancel</a>
            </div>
        </div>

    </form>

@endsection
