@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Рейтинг</h3>
            <div class="table-responsive table-responsive-data2">
                @if (sizeof($couples) > 0)
                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>Група</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($couples as $couple)
                            <tr class="tr-shadow">
                                <td>{{ $couple->group->name }}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{ route('rating.show',$couple->group->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Рейтинг" data-original-title="Рейтинг">
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
