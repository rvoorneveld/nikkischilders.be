@extends('layouts.admin.default')

@section('title')
    {{ __('customer.title') }}
@endsection

@section('actions')
    <a href="{{ route('customers.create') }}" class="mr-3 text-sm bg-orange-200 text-orange-600 py-2 px-3 rounded-lg font-bold">
        {{ __('customer.add') }}
    </a>
@endsection

@section('content')
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
