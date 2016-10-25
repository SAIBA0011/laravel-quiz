<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('welcome', compact('quizzes'));
    }

    public function create()
    {
        return view('admin.quiz.create');
    }

    public function store(Request $request)
    {
        $quiz = Quiz::create($request->except('_token'));
        return redirect()->route('admin.quiz.show', $quiz->slug);
    }

    public function show($quiz)
    {
        $quiz = Quiz::where('slug', $quiz)->get()->first();
        return view('admin.quiz.show', compact('quiz'));
    }

    public function update()
    {
        
    }

    public function destroy()
    {

    }
}
