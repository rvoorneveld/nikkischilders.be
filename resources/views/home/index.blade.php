@extends('layouts.default')

@section('content')
    @component('components.categories', compact('categories'))
    @endcomponent
@endsection
