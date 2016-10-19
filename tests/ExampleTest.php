<?php

use App\Event;
use App\Quiz;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

//    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $event = Event::create();
        $quiz = new Quiz([
            'title' => 'test'
        ]);
        $event->quizzes()->save($quiz);
        $question = new \App\Question();
        $quiz->questions()->save($question);

        $option = new \App\Option();
        $question->options()->save($option);

        $user = new \App\User(['email' => str_random(25).'@gmail.com']);
        $user->save();


        $attempt = new \App\Attempt();
        // create a new attempt for the user.
        $attempt->quiz()->associate($quiz);
        $attempt->user()->associate($user);
        $attempt->save();

        //save new answer.
        $answer = new \App\Answer();
        $answer->option()->associate($question);
        $answer->question()->associate($question);
        $answer->attempt()->associate($attempt);
        $answer->save();

        // check if the user has passed on this attempt and update the attempt accordingly.
        $attempt->update(['passed' => '1', 'percentage' => '50']);





    }
}
