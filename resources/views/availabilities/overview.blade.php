@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-start">
        <h1>{{ __('availability.title') }}</h1>
        <a class="ml-auto btn btn-primary" href="{{ route('availabilities.create') }}">{{ __('availability.add') }}</a>
    </div>


    <table class="table">
    @forelse($availabilities as $availability)
        <tr>
            <td>{{ $availability->getDateTimeStart() }}</td>
            <td>{{ $availability->getDateTimeEnd() }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="2">{{ __('availability.noResults') }}</td>
        </tr>
    @endforelse
    </table>

@endsection
