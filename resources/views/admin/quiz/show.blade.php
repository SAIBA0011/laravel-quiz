@extends('layouts.master')

@section('content')
    <div class="new-start">
        <h4>Quiz: {{ $quiz->title }}</h4>
        <div class="bottom-10"></div>
        <table class="table">
            <thead>
                <th>Questions</th>
                <th>Options</th>
            </thead>
            <tbody>
                @foreach($quiz->questions as $question)
                    <tr>
                        <td><a href="{{ route('admin.question.show', [ $question->slug, $quiz->slug ]) }}">{{ $question->title }}</a></td>
                        <td>{{ count($question->options) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.question.create', $quiz->slug) }}" class="btn btn-info">Add Questions</a>
    </div>
@endsection