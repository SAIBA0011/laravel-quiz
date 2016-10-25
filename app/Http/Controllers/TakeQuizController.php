<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Http\Requests;
use App\QuestionQuiz;

class TakeQuizController extends Controller
{
    public function start($quiz)
    {
        $quiz = Quiz::where('slug', $quiz)->get()->first();
        $question_id = QuestionQuiz::where('quiz_id', $quiz->id)->get();

        $questions = collect();
        foreach ($question_id as $id){
            $question = Question::with('options', 'answers')->where('id', $id->question_id)->first();
            $questions->push($question);
        }
        return view('quiz.start', compact('quiz', 'questions'));
    }
}
