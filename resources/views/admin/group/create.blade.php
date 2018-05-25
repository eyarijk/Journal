@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('groups.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <strong>Створення нової групи</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Назва</label>
                            <input type="text" id="name" name="name" class="@if ($errors->first('name')) is-invalid @endif form-control">
                        </div>
                        <div class="form-group">
                            <label for="faculty" class="form-control-label">Факультет</label>
                            <select name="faculty" id="faculty" class="form-control">
                                <option>Виберіть будь ласка факультет</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-users"></i> Створити
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
