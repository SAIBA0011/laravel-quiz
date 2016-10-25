@extends('layouts.master')
@section('content')
    <div class="new-start">
        <table class="table">
            <thead>
            <th>Quiz Title</th>
            <th>Quiz Questions</th>
            </thead>
            <tbody>
            @foreach($quizzes as $quiz)
                <tr>
                    <td><a href="{{ route('quiz.start', $quiz->slug) }}">{{ $quiz->title }}</a></td>
                    <td>{{ $quiz->questions->count() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.quiz.create') }}" class="btn btn-info btn-block">Create a new Quiz</a>
    </div>

@endsection