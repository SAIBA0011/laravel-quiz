@extends('layouts.master')
@section('content')
    <div class="new-start">
        <div class="row">
            {!! Form::open(['method' => 'post', 'route' => ['quiz.submit', $quiz->slug]]) !!}
            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-sm-offset-3">
                <div class="border-box">
                    <h4 class="text-center">Quiz: {{ $quiz->title }}</h4>
                </div>
                <ul class="list-group questions">
                    @if(count($questions))
                        @foreach($questions as $question)
                            <li class="list-group-item">
                                <div class="quiz-header" >
                                    Question: <b>{{ $question->title }}</b>
                                    <hr>
                                </div>
                                @foreach($question->options as $option)
                                    @if($question->answers->count() === 1)
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="input" onclick="$('.submit-single-question').removeClass('disabled')" name="option[{{$option->question_id}}]" value="{{ $option->id }}">
                                                {{ $option->title}}
                                            </label>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="input" onclick="$('.submit-single-question').removeClass('disabled')" name="option[{{$option->question_id}}][]" value="{{ $option->id }}">
                                                {{ $option->title}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                                <hr>
                                <div class="form-group text-center">
                                    @if(!$loop->last)
                                        <a href="#" id="submit-single-question" class="btn btn-success submit-single-question disabled" onclick="$('.submit-single-question').addClass('disabled')" target="{{$option->question_id}}">
                                            Next Question
                                        </a>
                                    @else
                                        <button type="submit" name="submit" class="btn btn-success submit-single-question disabled">Submit and See Result!</button>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">
                            <div class="quiz-header"><h5>Sorry, No questions found.</h5></div>
                            <hr>
                            <p>Why don't you rather return back to the <a href="/">home page</a></p>
                        </li>
                    @endif
                </ul>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
