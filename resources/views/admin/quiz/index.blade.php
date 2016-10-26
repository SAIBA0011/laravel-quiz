@extends('layouts.master')

@section('content')
    <div class="new-start">
        <h4>All Quizzes</h4>
        <div class="bottom-10"></div>
        <table class="table">
            <thead>
                <th>Quiz Title</th>
                <th>Quiz Questions</th>
                <th>Tools</th>
            </thead>
            <tbody>
            @if(count($quizzes))
                @foreach($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->title }}</td>
                        <td>{{ $quiz->questions->count() }}</td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">You have no quizzes available.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection