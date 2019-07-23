@extends('layouts.admin.default')

@section('title')
    {{ __('treatment.title') }}
@endsection

@section('actions')
    <a href="{{ route('treatments.create') }}" class="mr-3 text-sm bg-orange-200 text-orange-600 py-2 px-3 rounded-lg font-bold">
        {{ __('treatment.add') }}
    </a>
@endsection

@section('content')
    <table class="table">
    @forelse($treatments as $treatment)
        <tr>
            <td>{{ $treatment->id }}</td>
            <td>
                <a title="{{ $title = $treatment->getTitle() }}" href="{{ $treatment->getPath() }}">
                    {{ $title }}
                </a>
            </td>
            <td>{{ $treatment->getPrice() }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="2">{{ __('treatment.noResults') }}</td>
        </tr>
    @endforelse
    </table>
@endsection
