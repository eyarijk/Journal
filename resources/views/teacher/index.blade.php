@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Пари</h3>
            <div class="table-responsive table-responsive-data2">
                @if (sizeof($couples) > 0)
                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>Предмет</th>
                            <th>Група</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($couples as $couple)
                            <tr class="tr-shadow">
                                <td>{{ $couple->subject->name }}</td>
                                <td>{{ $couple->group->name }}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{ route('teacher.couple',$couple->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Журнал" data-original-title="Перейти в журнал">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Нічого не знайдено !</p>
                @endif
            </div>
        </div>
    </div>
@endsection
