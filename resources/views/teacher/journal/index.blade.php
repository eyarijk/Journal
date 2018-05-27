@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">Пари</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <a style="color:#fff;" href="{{ route('journal.create',$couple) }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Створити журнал</a>
                    <a href="{{ route('black-list.index',$couple) }}" class="btn btn-dark">
                        Чорний список</a>
                </div>

            </div>
            <div class="table-responsive table-responsive-data2">
                @if (sizeof($times) > 0)
                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>Рік</th>
                            <th>Місяць</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($times as $key => $time)
                           @foreach($time as $item)
                               <tr class="tr-shadow">
                                   <td>{{ $key }}</td>
                                   <td>{{ $func($item) }}</td>
                                   <td>
                                       <div class="table-data-feature">
                                           <a href="/journal/{{ $item}}/{{ $key }}/couple/{{ $couple->id }}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Перегляд журнала">
                                               <i class="zmdi zmdi-eye"></i>
                                           </a>
                                       </div>
                                   </td>
                               </tr>
                               <tr class="spacer"></tr>
                           @endforeach
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
