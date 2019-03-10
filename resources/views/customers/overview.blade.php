@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-start">
        <h1>{{ __('customer.title') }}</h1>
        <a class="ml-auto btn btn-primary" href="{{ route('customers.create') }}">{{ __('customer.add') }}</a>
    </div>


    <table class="table">
    @forelse($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>
                <a title="{{ $name = $customer->getName() }}" href="{{ $customer->getPath() }}">
                    {{ $name }}
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2">{{ __('customer.noResults') }}</td>
        </tr>
    @endforelse
    </table>

@endsection
