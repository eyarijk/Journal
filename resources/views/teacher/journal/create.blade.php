@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('journal.store',$couple->id) }}" method="post">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <strong>Предмет: {{ $couple->subject->name }} - група: {{ $couple->group->name }}</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="month" class="form-control-label">Місяць</label>
                            <select name="month" id="month" class="form-control">
                                <option>Виберіть будь ласка місяць</option>
                                @foreach($freeMonth as $item)
                                    <option value="{{ $item }}">{{$func($item) }}</option>
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
