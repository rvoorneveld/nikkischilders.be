@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-start">
        <h1>{{ __('appointment.title') }}</h1>
        <a class="ml-auto btn btn-primary" href="{{ route('appointments.create') }}">{{ __('appointment.add') }}</a>
    </div>


    <table class="table">
    @forelse($appointments as $appointment)
        <tr>
            <td>{{ $appointment->id }}</td>
            <td>
                <a title="{{ $title = $appointment->getDateTimeStart() }}" href="{{ $appointment->getPath() }}">
                    {{ $title }}
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2">{{ __('appointment.noResults') }}</td>
        </tr>
    @endforelse
    </table>

@endsection
