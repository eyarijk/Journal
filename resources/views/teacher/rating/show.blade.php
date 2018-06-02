@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Рейтинг група: {{ $group->name }} ({{ $year }} рік / {{ $semester }} семестр)</h3>
            <rating-list :group="{{ $group->id }}" :teacher="{{ $teacher }}" :ratings="{{ json_encode($ratings) }}" :subjects="{{ json_encode($subjects) }}" :year="{{ $year }}" :semester="{{ $semester }}"></rating-list>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
