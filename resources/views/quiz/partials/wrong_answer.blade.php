<h4>Wrong Answers:</h4>
<hr>
@foreach($wrong_answer as $key => $value)
    <p><b>{{ \App\Models\Question::find($key)->title }}</b></p>
    <div style="display: none;">
        {{ $options = \App\Models\Option::where('question_id', $key)->get() }}
        {{ $wrong_single_answer = \App\Models\Answer::where('question_id', $key)->get()}}
    </div>
    @foreach($options as $option)
        @if(!is_array($value))
            @if($option->id == $value )
                <li class="text-danger"><strong>{{ $option->title }}</strong> <i class="fa fa-close"></i></li>
            @else
                <li>{{ $option->title }}</li>
            @endif
        @else
            @if(in_array($option->id, $value))
                <li class="text-danger"><strong>{{ $option->title }}</strong> <i class="fa fa-close"></i></li>
            @else
                <li>{{ $option->title }}</li>
            @endif
        @endif
    @endforeach
    <hr>
    <h5>Correct Answers</h5>
    <div class="panel panel-default">
        <div class="panel-footer">
            @if(count($wrong_single_answer) == 1)
                <dd class="text-success"><strong>{{ \App\Models\Option::find($wrong_single_answer[0]->option_id)->title }}</strong></dd>
            @else
                @foreach($wrong_single_answer as $answers)
                    <dd class="text-success"><strong>{{ \App\Models\Option::find($answers->option_id)->title }}</strong></dd>
                @endforeach
            @endif
        </div>
    </div>
@endforeach