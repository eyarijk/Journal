@extends('layouts.app')

@section('content')
   <black-list :couple="{{ json_encode($couple) }}"></black-list>
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection