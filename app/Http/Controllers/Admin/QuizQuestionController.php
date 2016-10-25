<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuizQuestionController extends Controller
{

    public function index()
    {
        //
    }

    public function create($quiz)
    {
        $quiz = Quiz::with('questions')->where('slug', $quiz)->get()->first();
        return view('admin.question.create', compact('quiz'));
    }

    public function store(Request $request, $quiz)
    {
        $quiz = Quiz::where('slug', $quiz)->get()->first();
        $question = Question::create($request->except('options', '_token'));
        $question->quiz()->save($quiz)->save();

        foreach ($request->options as $option){
            $option = Option::create($option);
            $question->options()->save($option);
        }
        return back();
    }

    public function show($question, $quiz)
    {
        $question = Question::where('slug', $question)->get()->first();
        $quiz = Quiz::where('slug', $quiz)->get()->first();
        return view('admin.question.show', compact('question', 'quiz'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
