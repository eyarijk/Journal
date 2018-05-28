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
                            <label for="subject" class="form-control-label">Заняття </label>
                            <select name="subject" id="subject" class="form-control">
                                <option>Виберіть будь ласка заняття</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="year" class="form-control-label">Рік</label>
                            <input type="text" name="year" value="{{ date('Y') }}" id="year" class="form-control">
                        </div>
                        <div class="form-check">
                            <div class="radio">
                                <label for="radio1" class="form-check-label ">
                                    <input type="radio" id="radio1" name="semester" value="1" class="form-check-input">1 семестр
                                </label>
                            </div>
                            <div class="radio">
                                <label for="radio2" class="form-check-label ">
                                    <input type="radio" id="radio2" name="semester" value="2" class="form-check-input">2 семестр
                                </label>
                            </div>
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
