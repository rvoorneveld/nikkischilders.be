@extends('layouts.admin.default')

@section('title')
    {{ __('appointment.edit') }} #{{ $appointment->id }}
@endsection

@section('actions')
    <a href="{{ route('appointments.create') }}" class="mr-3 text-sm bg-green-200 text-green-600 py-2 px-3 rounded-lg font-bold">
        {{ __('shared.save') }}
    </a>
    <a href="{{ route('appointments') }}" class="mr-3 text-sm bg-red-200 text-red-600 py-2 px-3 rounded-lg font-bold">
        {{ __('shared.cancel') }}
    </a>
@endsection

@section('content')
    <form method="POST">
        @csrf
        @method('PUT')
    </form>
@endsection
