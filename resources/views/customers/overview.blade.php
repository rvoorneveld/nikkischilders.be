@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-start">
        <h1>Customers</h1>
        <a class="ml-auto btn btn-primary" href="{{ route('customers.create') }}">Add customer</a>
    </div>


    <table class="table">
    @forelse($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>
                <a title="{{ $customer->getName() }}" href="{{ $customer->getPath() }}">
                    {{ $customer->getName() }}
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2">No customers to display.</td>
        </tr>
    @endforelse
    </table>

@endsection
