@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Questions Answers<span class="pull-right">Question Title: <strong>{{ $question->title }}</strong></span></h4>
        <hr>
        <table class="table">
            <thead>
                <th>Position</th>
                <th>Answer</th>
                <th>Description</th>
            </thead>
            <tbody>
            @if(count($question->options))
                @foreach($question->options as $option)
                    <tr>
                        <td>{{ $option->position }}</td>
                        <td><a href="{{ route('option.show', [ $option->slug, $quiz->slug ]) }}">{{ $option->title }}</a></td>
                        <td>{{ $option->description }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">You have no answers</td>
                </tr>
            @endif
            </tbody>
        </table>
        <hr>
        <a href="/" class="btn btn-info">Back to Questions</a>
        <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#question_modal">Add Answer</a>
    </div>

    <!-- Question Modal -->
    <div id="question_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['method' => 'post']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Question</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('title', 'Question title') !!}
                        {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('type', 'Question Type') !!}
                        {!! Form::select('type', [
                            'single' => 'Single Select',
                            'multiple' => 'Multi Select'
                        ] ,null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Question description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Question</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection