@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('teachers.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <strong>Створення нового викладача</strong>
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
                            <label for="email" class="form-control-label">E-Mail</label>
                            <input type="email" id="email" name="email" class="@if ($errors->first('email')) is-invalid @endif form-control">
                        </div>
                        <div class="form-group">
                            <label for="username" class="form-control-label">Ім'я користувача</label>
                            <input type="text" name="username" id="username" class="@if ($errors->first('username')) is-invalid @endif form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-control-label">Пароль</label>
                            <input type="password" name="password" id="password" class="@if ($errors->first('password')) is-invalid @endif form-control">
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
