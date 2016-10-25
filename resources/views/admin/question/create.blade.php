@extends('layouts.master')

@section('content')
    <div class="new-start">
        <h4>Quiz: {{ $quiz->title }}</h4>
        <hr>

        {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('title', 'Question Title') !!}
            {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
        </div>

        <hr>
        <div class="question-options"></div>
        <div class="add-question-option btn btn-info">Add New Option</div>
        <hr>

        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection