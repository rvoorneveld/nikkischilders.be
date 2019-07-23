@extends('layouts.admin.default')

@section('title')
    {{ __('appointment.title') }}
@endsection

@section('actions')
    <a href="{{ route('appointments.create') }}" class="mr-3 text-sm bg-orange-200 text-orange-600 py-2 px-3 rounded-lg font-bold">
        {{ __('appointment.add') }}
    </a>
@endsection

@section('content')
    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th class="text-left">#</th>
                <th>{{ __('shared.date') }}</th>
                <th>{{ __('customer.title_single') }}</th>
                <th>{{ __('treatment.title_single') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse($appointments as $appointment)
            <tr>
                <td>{{ $appointment->id }}</td>
                <td>
                    <a title="{{ $dateTimeStart = $appointment->getDateTimeStart() }}" href="{{ $appointment->getPath() }}">
                        {{ $dateTimeStart }}
                    </a>
                </td>
                <td>
                    <a title="{{ $name = $appointment->customer->getName() }}" href="{{ $appointment->customer->getPath() }}">
                        {{ $name }}
                    </a>
                </td>
                <td>
                    {{ $appointment->treatment->getTitle() }}
                </td>
                <td>
                    <a title="{{ __('shared.edit') }}" href="{{ $appointment->getPath() }}">&#9998;</a>
                    <a title="{{ __('shared.delete') }}" href="{{ $appointment->getPath() }}">&#10005;</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">{{ __('appointment.noResults') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
