@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Групи</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <a style="color:#fff;" href="{{ route('groups.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Додати групу</a>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                @if (sizeof($groups) > 0)
                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>Назва</th>
                            <th>Кількість студентів</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                            <tr class="tr-shadow">
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->student->count() }} студентів</td>
                                <td>
                                    <div class="table-data-feature">
                                        <form method="post" action="{{ route('groups.delete',$group->id) }}">
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
