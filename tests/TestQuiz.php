<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestQuiz extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // Create a new Quiz
        $quiz = Quiz::create([
            'title' => 'testing quiz',
            'event_id' => '1',
            'max_attempts' => '3',
            'cpd_hours' => '1',
            'pass_percentage' => '50',
            'instructions' => 'none'
        ])->save();

        dd($quiz);
    }
}
