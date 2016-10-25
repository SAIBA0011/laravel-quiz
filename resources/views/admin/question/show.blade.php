@extends('layouts.master')

@section('content')
    <div class="new-start">
        <h4>Question: {{ $question->title }}</h4>
        <div class="bottom-10"></div>

        @if($question->answerIsSet())
            <table class="table">
                <thead>
                    <th>Option</th>
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
        @else
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
                {!! Form::submit('Save Changes', ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
        @endif
    </div>
@endsection