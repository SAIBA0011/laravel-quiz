<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Quiz;
use App\Models\QuizResults;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuizResultsController extends Controller
{

    public function index($quiz)
    {
        return view('quiz.result', compact($quiz));
    }

    public function store(Request $request, $quiz){

        $user = auth()->user();
        $quiz = Quiz::where('slug', $quiz)->get()->first();
        $results = QuizResults::where('user_id', $user->id)->where('quiz_id', $quiz->id)->get();

        // Check if the given user has reached it max attempts to try the quiz
        if ($results->count() === $quiz->max_attempts){
            $message = 'You have reached the maximum amount of attempts for this quiz.';
            return back();

        // Check if the given user has already passed this quiz.
        }elseif($results->where('percentage', '>=' ,$quiz->pass_percentage)->count() === 1){
            $message = 'You have already pass this quiz.';
            return back();
        }else

        if($request->option){
            foreach($request->option as $key => $value){
                $answer = Answer::select('option_id')->where('question_id','=',$key)->get();

                // Single Answer
                if(count($answer) === 1){
                    $answer = $answer->first();

                    if($answer->option_id == $value){
                        $correct_answer[$key] = $value;
                    }else{
                        $wrong_answer[$key] = $value;
                    }

                }else{
                    // Multiple Answer
                    foreach($answer as $ans){
                        foreach ($value as $val) {
                            if($ans->option_id == $val){
                                $multiple_right_answer[] = $val;
                            }
                        }
                    }

                    if(isset($multiple_right_answer)){
                        if(count($multiple_right_answer) == count($answer)){
                            $correct_answer[$key] = $value;
                        }else{
                            $wrong_answer[$key] = $value;
                        }
                    }else{
                        $wrong_answer[$key] = $value;
                    }
                }//End of Multiple answer
                $multiple_right_answer = null;
            }

            if(isset($correct_answer)){
                $correct_answer_count = count($correct_answer);

            }else{
                $correct_answer_count = 0;
                $correct_answer = null;
                $chart = null;
            }

            if(isset($wrong_answer)){
                $wrong_answer_count = count($wrong_answer);
            }else {
                $wrong_answer_count = 0;
                $wrong_answer = null;
            }

            $success_percentage = ceil(($correct_answer_count * 100)/($correct_answer_count + $wrong_answer_count));

            // Check the passed status and save the results.
            $passed = $this->checkPassedStatus($quiz, $success_percentage);
            $this->saveQuizResultData($quiz, $correct_answer_count, $wrong_answer_count, $success_percentage, $passed);

            $user_given_inputs = $request->option;
            return view('quiz.result')->with(['user_given_inputs' => $user_given_inputs,'percentage' => $success_percentage,'correct_answer' => $correct_answer,'wrong_answer' => $wrong_answer]);
        }else {
            return view('quiz.result')->with(['message' => 'You did not answer any questions. Try again!']);
        }
    }

    /**
     * @param $quiz
     * @param $success_percentage
     * @return bool
     */
    public function checkPassedStatus($quiz, $success_percentage)
    {
        if ($success_percentage >= $quiz->pass_percentage) {
            $passed = true;
            return $passed;
        } else
            $passed = false;
        return $passed;
    }

    /**
     * @param $quiz
     * @param $correct_answer_count
     * @param $wrong_answer_count
     * @param $success_percentage
     * @param $passed
     */
    public function saveQuizResultData($quiz, $correct_answer_count, $wrong_answer_count, $success_percentage, $passed)
    {
        $result_data = [
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'total_attempt' => ($correct_answer_count + $wrong_answer_count),
            'correct_answers' => $correct_answer_count,
            'percentage' => $success_percentage,
            'passed' => $passed
        ];
        QuizResults::create($result_data);
    }
}
