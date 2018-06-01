@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Студенти</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <a style="color:#fff;" href="{{ route('students.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Додати студента</a>
                </div>
            </div>
            <form action="{{ route('students.index') }}" id="form-sort" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <label for="faculty">Факультет</label>
                        <select name="faculty" onchange="document.getElementById('form-sort').submit();" id="faculty" class="custom-select">
                            @foreach($faculties as $faculty)
                                <option @if($selectFaculty == $faculty->id) selected @endif value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="group">Група</label>
                        <select name="group" onchange="document.getElementById('form-sort').submit();" id="group"  class="custom-select">
                            @foreach($groups as $group)
                                <option @if($selectGroup == $group->id) selected @endif value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <div class="table-responsive table-responsive-data2">
                @if (sizeof($students) > 0)
                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>Прізвище</th>
                            <th>Ім'я</th>
                            <th>Група</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr class="tr-shadow">
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->first_name }}</td>
                                <td class="desc">{{ $student->group->name }}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <form method="post" action="{{ route('students.delete',$student->id) }}">
                                            {{ method_field('delete') }}
                                            {{ csrf_field()}}
                                            <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Видалити">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </form>
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
