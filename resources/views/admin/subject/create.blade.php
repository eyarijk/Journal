@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('subjects.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <strong>Створення нового заняття</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Назва</label>
                            <input type="text" id="name" name="name" class="@if ($errors->first('name')) is-invalid @endif form-control">
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
