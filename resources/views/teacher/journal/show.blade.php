@extends('layouts.app')

@section('content')
    <list-group :couple="{{ $couple }}" :month="{{ $month }}" :year="{{ $year }}"></list-group>
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection