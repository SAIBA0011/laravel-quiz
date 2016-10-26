<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuizAnswerController extends Controller
{
    public function store(Request $request, $question)
    {
        $question = Question::where('slug', $question)->get()->first();
        foreach ($request->option as $option){
            $answer = new Answer();
            $answer->option()->associate($option);
            $answer->question()->associate($question);
            $answer->save();
        }
        return back();
    }
}
