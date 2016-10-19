<?php
/**
 * Created by PhpStorm.
 * User: Tiaan Theunissen
 * Date: 2016/10/19
 * Time: 2:16 PM
 */

namespace App\Repositories\Quiz;


use App\Question;

class QuestionRepository
{
    private $question;
    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function findBySlug($question)
    {
        return $this->question->where('slug', $question)->get()->first();
    }
}