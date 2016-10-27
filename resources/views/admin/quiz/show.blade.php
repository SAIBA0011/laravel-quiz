@extends('layouts.master')

@section('content')
    <div class="new-start">
        <h4>Quiz: {{ $quiz->title }}</h4>
        <hr>
        <div class="bottom-10"></div>
        <table class="table">
            <thead>
                <th>Questions</th>
                <th>Options</th>
                <th>Correct Answer</th>
                <th>Tools</th>
            </thead>
            <tbody>
                @foreach($quiz->questions as $question)
                    <tr>
                        <td><a href="{{ route('admin.question.show', [$quiz->slug, $question->slug]) }}">{{ $question->title }}</a></td>
                        <td>{{ count($question->options) }}</td>
                        <td>
                            @if(count($question->answers) === 0)
                                <a href="{{ route('admin.question.show',[$quiz->slug, $question->slug]) }}">Add Answer</a>
                            @else
                                {{ \App\Models\Option::find($question->answers->first()->option_id)->title }}
                            @endif
                        </td>
                        <td><a href="{{ route('admin.question.destroy', $question->slug) }}">Delete Question</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="/" class="btn btn-success">Home</a>
        <a href="{{ route('admin.question.create', $quiz->slug) }}" class="btn btn-info">Add Questions</a>
    </div>
@endsection