@extends('layouts.app')

@section('content')
   <black-list :groups="{{ json_encode($groups) }}" :years="{{ json_encode($years) }}"></black-list>
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection