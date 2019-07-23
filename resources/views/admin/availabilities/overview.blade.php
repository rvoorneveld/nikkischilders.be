@extends('layouts.admin.default')

@section('title')
    {{ __('availability.title') }}
@endsection

@section('actions')
    <a href="{{ route('availabilities.create') }}" class="mr-3 text-sm bg-orange-200 text-orange-600 py-2 px-3 rounded-lg font-bold">
        {{ __('availability.add') }}
    </a>
@endsection

@section('content')
    <table class="table">
    @forelse($availabilities as $availability)
        <tr>
            <td>{{ $availability->id }}</td>
            <td>
                <a title="{{ $dateTime = $availability->getDateTime() }}" href="{{ $availability->getPath() }}">
                    {{ $dateTime }}
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2">{{ __('availability.noResults') }}</td>
        </tr>
    @endforelse
    </table>
@endsection
