<?php

use App\Quiz;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
    }
}
