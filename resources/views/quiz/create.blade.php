@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12">
        <h4>Quiz Creation</h4>
        <hr>
        {!! Form::open(['method' => 'post', 'route' => 'quiz.store']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Quiz Title') !!}
            {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Quiz Description') !!}
            {!! Form::input('text', 'description', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Next', ['class' => 'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection

