@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-start">
        <h1>{{ __('appointment.title') }}</h1>
        <a class="ml-auto btn btn-primary" href="{{ route('appointments.create') }}">{{ __('appointment.add') }}</a>
    </div>


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
