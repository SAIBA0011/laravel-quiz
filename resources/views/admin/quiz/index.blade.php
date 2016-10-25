@extends('layouts.master')

@section('content')
    <div class="new-start">
        <h4>All Quizzes</h4>
        <div class="bottom-10"></div>
        <table class="table">
            <thead>
                <th>Quiz Title</th>
                <th>Quiz Questions</th>
            </thead>
            <tbody>
            @foreach($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz->title }}</td>
                    <td>{{ $quiz->questions->count() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection