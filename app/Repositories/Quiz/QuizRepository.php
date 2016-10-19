<?php

namespace App\Repositories\Quiz;
use App\Quiz;

/**
 * Created by PhpStorm.
 * User: Tiaan Theunissen
 * Date: 2016/10/19
 * Time: 1:27 PM
 */
class QuizRepository
{
    private $quiz;
    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function all()
    {
        return $this->quiz->all();
    }

    public function save($request)
    {
        return $this->quiz->create($request);
    }

    public function findBySlug($slug)
    {
        return $this->quiz->where('slug', $slug)->get()->first();
    }
}