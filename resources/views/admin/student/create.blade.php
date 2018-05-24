@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('students.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <strong>Створення нового студента</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="last_name" class="form-control-label">Прізвище</label>
                            <input type="text" id="last_name" name="last_name" class="@if ($errors->first('last_name')) is-invalid @endif form-control">
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="form-control-label">Ім'я</label>
                            <input type="text" id="first_name" name="first_name" class="@if ($errors->first('first_name')) is-invalid @endif form-control">
                        </div>
                        <div class="form-group">
                            <label for="group" class="form-control-label">Група</label>
                            <select name="group" id="group" class="form-control">
                                <option>Виберіть будь ласка групу</option>
                                @foreach($groups as $group)
                                     <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-user"></i> Створити
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
