<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('welcome', compact('quizzes'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $quiz = Quiz::create($request->all());
        return redirect()->route('admin.quiz.show', $quiz->slug);
    }

    /**
     * @param $quiz
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($quiz)
    {
        $quiz = Quiz::where('slug', $quiz)->get()->first();
        return view('admin.quiz.show', compact('quiz'));
    }

    /**
     * @param $quiz
     */
    public function update($quiz)
    {
        
    }

    /**
     * @param $quiz
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($quiz)
    {
        $quiz = Quiz::where('slug', $quiz)->first();
        $this->deleteQuestions($quiz);
        $quiz->delete();
        return back();
    }

    /**
     * @param $quiz
     * Grab all the quiz questions and delete them.
     */
    public function deleteQuestions($quiz)
    {
        $questions = $quiz->questions;
        foreach ($questions as $question) {
            $question->delete();
        }
    }
}
