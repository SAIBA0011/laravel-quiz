@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Quiz Questions <span class="pull-right">Quiz Title: <strong>{{ $quiz->title }}</strong></span></h4>
        <hr>
        <table class="table">
            <thead>
                <th>Position</th>
                <th>Question</th>
                <th>Description</th>
                <th>Type</th>
                <th>Answers</th>
            </thead>
            <tbody>
                @if(count($quiz->questions))
                   @foreach($quiz->questions as $question)
                        <tr>
                            <td>{{ $question->position }}</td>
                            <td><a href="{{ route('questions.show', [$question->slug, $quiz->slug]) }}">{{ $question->title }}</a></td>
                            <td>{{ $question->description }}</td>
                            <td>{{ $question->type }}</td>
                            <td>{{ count($question->answers) }}</td>
                        </tr>
                   @endforeach
                @else
                <tr>
                    <td colspan="5">You have no questions</td>
                </tr>
                @endif
            </tbody>
        </table>
        <hr>
        <a href="/" class="btn btn-info">Back to Quizzes</a>
        <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#question_modal">Add Question</a>
    </div>

    <!-- Question Modal -->
    <div id="question_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['method' => 'post', 'route' => ['questions.store', $quiz->slug]]) !!}
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