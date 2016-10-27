@extends('layouts.master')
@section('content')
    <div class="new-start">
        <table class="table">
            <thead>
            <th>Quiz Title</th>
            <th>Show</th>
            <th>Questions</th>
            <th>Total Questions</th>
            <th>Start</th>
            <th></th>
            </thead>
            <tbody>
            @if($quizzes)
                @foreach($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->title }}</td>
                        <td><a href="{{ route('admin.quiz.show', $quiz->slug) }}">View Quiz</a></td>
                        <td><a href="{{ route('admin.question.create', $quiz->slug) }}" class="btn btn-info">Add Questions</a></td>
                        <td>@if(count($quiz->questions) <= 1) {{ $quiz->questions->count() }} Question @else {{ $quiz->questions->count() }} Questions @endif</td>
                        <td><a href="{{ route('quiz.start', $quiz->slug) }}" class="btn btn-success">Start Quiz</a></td>
                        <td><a href="{{ route('admin.quiz.destroy', $quiz->slug) }}" class="btn btn-danger">Remove</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">You have no available quizzes.</td>
                </tr>
            @endif
            </tbody>
        </table>

        <a href="{{ route('admin.quiz.create') }}" class="btn btn-info btn-block">Create a new Quiz</a>
    </div>

@endsection