<?php

namespace App\Http\Controllers;

use App\Question;
use App\Repositories\Quiz\QuestionRepository;
use App\Repositories\Quiz\QuizRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class QuizQuestionController extends Controller
{

    private $quizRepository, $questionRepository;
    public function __construct(QuizRepository $quizRepository, QuestionRepository $questionRepository)
    {
        $this->quizRepository = $quizRepository;
        $this->questionRepository = $questionRepository;
    }

    public function show($question, $quiz)
    {
        $quiz = $this->quizRepository->findBySlug($quiz);
        $question = $this->questionRepository->findBySlug($question);
        return view('questions.show', compact('question', 'quiz'));
    }

    /**
     * @param Request $request
     * @param $quiz
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $quiz)
    {
        $this->validate($request, ['title' => 'required']);
        $quiz = $this->quizRepository->findBySlug($quiz);
        $question = Question::create($request->all());
        $question->quiz()->associate($quiz);
        $question->save();

        return back();
    }
}
