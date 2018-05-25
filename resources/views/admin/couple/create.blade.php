@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('couples.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <strong>Створення нової пари</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="teacher" class="form-control-label">Викладач</label>
                            <select name="teacher" id="teacher" class="form-control">
                                <option>Виберіть будь ласка викладача</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->getFullName() }}</option>
                                @endforeach
                            </select>
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
                        <div class="form-group">
                            <label for="subject" class="form-control-label">Заняття</label>
                            <select name="subject" id="subject" class="form-control">
                                <option>Виберіть будь ласка заняття</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
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
