<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Repositories\Quiz\QuizRepository;
use Illuminate\Http\Request;
use App\Http\Requests;

class QuizController extends Controller
{
    private $repository;
    public function __construct(QuizRepository $repository)
    {
        $this->repository = $repository;
    }

    // lets display all the quizzes.
    public function index()
    {
        $quizzes = $this->repository->all();
        return view('quiz.index', compact('quizzes'));
    }

    // Lets create a new Quiz
    public function create()
    {
        return view('quiz.create');
    }

    // Store the new Quiz
    public function store(Request $request)
    {
        $quiz = $this->repository->save($request->all());
        return redirect()->route('quiz.show', [ $quiz->slug ]);
    }

    // Show the requested quiz.
    public function show($quiz)
    {
        $quiz = Quiz::where('slug', $quiz)->first();
        return view('quiz.show', compact('quiz'));
    }
}
