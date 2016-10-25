@extends('layouts.master')
@section('content')
    <div class="new-start">
        <h4>Quiz: {{ $quiz->title }}</h4>
        <hr>
        {!! Form::open(['method' => 'post', 'route' => ['quiz.submit', $quiz->slug]]) !!}
        <ul class="list-group questions">
            @foreach($questions as $question)
                <li class="list-group-item">Question: <b>{{ $question->title }}</b>
                    @foreach($question->options as $option)
                        @if($question->answers->count() === 1)
                            <div class="radio" >
                                <label>
                                    <input type="radio" class="" name="option[{{$option->question_id}}]" value="{{ $option->id }}">
                                    {{ $option->title}}
                                </label>
                            </div>
                        @else
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="" name="option[{{$option->question_id}}][]" value="{{ $option->id }}">
                                    {{ $option->title}}
                                </label>
                            </div>
                        @endif
                    @endforeach
                    <div class="form-group text-center">
                        <a href="#" id="submit-single-question" class="btn btn-default" target="{{$option->question_id}}">Submit</a>
                    </div>
                </li>
            @endforeach
                <div class="form-group final-submit text-center">
                    <h4>You have answered the questions! Click the below button to see your result!</h4>
                    <button type="submit" name="submit" class="btn btn-info">Submit and See Result!</button>
                </div>
        </ul>
        {!! Form::close() !!}
    </div>
@endsection
