@extends('layouts.master')
@section('content')
    <div class="new-start">
        <table class="table">
            <thead>
            <th>Quiz Title</th>
            <th>Quiz Questions</th>
            <th>Edit</th>
            <th></th>
            </thead>
            <tbody>
            @if($quizzes)
                @foreach($quizzes as $quiz)
                    <tr>
                        <td><a href="{{ route('quiz.start', $quiz->slug) }}">{{ $quiz->title }}</a></td>
                        <td>{{ $quiz->questions->count() }}</td>
                        <td><a href="{{ route('admin.question.create', $quiz->slug) }}" class="btn btn-info">Add Questions</a></td>
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