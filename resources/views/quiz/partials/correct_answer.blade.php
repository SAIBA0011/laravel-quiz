<h4>Correct Answers:</h4>
<hr>
@foreach($correct_answer as $key => $value)

    <div style="display: none;">{{ $options = \App\Models\Option::where('question_id', $key)->get() }}</div>
    <p><b>{{ \App\Models\Question::find($key)->title }}</b></p>

    @foreach($options as $option)
        @if(!is_array($value))
            @if($option->id == $value )
                <li class="text-success"><strong>{{ $option->title }}</strong> <i class="fa fa-check"></i></li>
            @else
                <li>{{ $option->title }} </li>
            @endif
        @else
            @if(in_array($option->id,$value))
                <li class="text-success"><strong>{{ $option->title }}</strong> <i class="fa fa-check"></i> </li>
            @else
                <li>{{ $option->title }}</li>
            @endif
        @endif
    @endforeach
    <hr>
@endforeach
