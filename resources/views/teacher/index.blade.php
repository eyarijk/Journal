@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Пари</h3>
            <form action="{{ route('teacher.index') }}" id="form-sort" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <label for="year">Рік</label>
                        <select name="year" onchange="document.getElementById('form-sort').submit();" id="year" class="custom-select">
                            @foreach($years as $year)
                                <option @if($year == $selectYear) selected @endif value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="semester">Семестр</label>
                        <select name="semester" onchange="document.getElementById('form-sort').submit();" id="semester"  class="custom-select">
                            <option @if($semester == 1) selected @endif value="1">1</option>
                            <option @if($semester == 2) selected @endif value="2">2</option>
                        </select>
                    </div>
                </div>
            </form>
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
