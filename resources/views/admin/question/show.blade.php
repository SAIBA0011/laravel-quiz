@extends('layouts.master')

@section('content')
    <div class="new-start">
        <h4>Question: {{ $question->title }}</h4>
        <div class="bottom-10"></div>

        @if($question->answerIsSet())
            <table class="table">
                <thead>
                    <th>Answer Option</th>
                    <th>Correct</th>
                </thead>
                <tbody>
                    @foreach($question->options as $option)
                        <tr>
                            <td>{{ $option->title }}</td>
                            <td>
                                @if($option->isCorrect())
                                    Correct
                                @else
                                    Incorrect
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.quiz.show', $quiz->slug) }}" class="btn btn-info">Back to Quiz</a>
        @else
            <p>Please select your answers for this question</p>
            <hr>
            {!! Form::open(['method' => 'post', 'route' => [ 'admin.answer.store', $question->slug ]]) !!}
                @foreach($question->options as $option)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="" name="option[]" value="{{ $option->id }}">
                            {{ $option->title }}
                        </label>
                    </div>
                @endforeach
            <hr>
                {!! Form::submit('Save Changes', ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
        @endif
    </div>
@endsection