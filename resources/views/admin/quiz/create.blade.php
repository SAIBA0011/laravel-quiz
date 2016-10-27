@extends('layouts.master')

@section('content')
    <div class="new-start">
        <h4>New Quiz</h4>
        <hr>
        {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::hidden('reference') !!}

        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection