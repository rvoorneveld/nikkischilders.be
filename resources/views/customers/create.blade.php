@extends('layouts.app')

@section('content')
    <h1>Create customer</h1>

    <form method="POST" action="{{ $customersOverviewRoute = route('customers') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastName" id="lastName" value="">
            </div>
            <div class="form-group col-md-6">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" value="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="emailAddress">Email address</label>
                <input type="text" class="form-control" name="emailAddress" id="emailAddress" value="">
            </div>
            <div class="form-group col-md-6">
                <label for="phoneNumber">Phone number</label>
                <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="{{ $customersOverviewRoute }}">Cancel</a>
            </div>
        </div>

    </form>

@endsection
