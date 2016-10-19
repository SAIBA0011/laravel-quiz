@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <h4>All Quizzes</h4>
            <hr>
            <table class="table">
                <thead>
                <th>Quiz Title</th>
                <th>Quiz Description</th>
                <th>Quiz Questions</th>
                </thead>
                <tbody>
                @foreach($quizzes as $quiz)
                    <tr>
                        <td><a href="{{ route('quiz.show', $quiz->slug) }}">{{ $quiz->title }}</a></td>
                        <td>{{ $quiz->description }}</td>
                        <td>{{ count($quiz->questions) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('quiz.create') }}" class="btn btn-success">Create a Quiz</a>
        </div>
    </div>
@endsection