@extends('layouts.admin.default')

@section('content')

    <div class="d-flex align-items-start">
        <h1>{{ __('treatment.title') }}</h1>
        <a class="ml-auto btn btn-primary" href="{{ route('treatments.create') }}">{{ __('treatment.add') }}</a>
    </div>


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
