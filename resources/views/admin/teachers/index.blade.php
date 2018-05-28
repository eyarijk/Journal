@extends('layouts.app')

@section('content')
   <div class="row">
       <div class="col-md-12">
           <h3 class="title-5 m-b-35">Викладачі</h3>
           <div class="table-data__tool">
               <div class="table-data__tool-right">
                   <a style="color:#fff;" href="{{ route('teachers.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                       <i class="zmdi zmdi-plus"></i>Додати викладача</a>
               </div>
           </div>
           <div class="table-responsive table-responsive-data2">
               @if (sizeof($teachers) > 0)
                   <table class="table table-data2">
                       <thead>
                       <tr>
                           <th>Прізвище</th>
                           <th>Ім'я</th>
                           <th>email</th>
                           <th>Ім'я користувача</th>
                           <th></th>
                       </tr>
                       </thead>
                       <tbody>
                           @foreach($teachers as $teacher)
                               <tr class="tr-shadow">
                                   <td>{{ $teacher->last_name }}</td>
                                   <td>{{ $teacher->first_name }}</td>
                                   <td>
                                       <span class="block-email">{{ $teacher->email }}</span>
                                   </td>
                                   <td class="desc">{{ $teacher->username }}</td>
                                   <td>
                                       <div class="table-data-feature">
                                           <form method="post" action="{{ route('teachers.delete',$teacher->id) }}">
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
