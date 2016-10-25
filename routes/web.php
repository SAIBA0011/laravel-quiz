<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();
Auth::routes();
Route::get('/home', 'HomeController@index');


// Quiz Creation
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function (){

    // Quiz
    Route::get('quiz/new', ['as' => 'quiz.create', 'uses' => 'QuizController@create']);
    Route::post('quiz/new', ['as' => 'quiz.store', 'uses' => 'QuizController@store']);
    Route::get('{quiz}/show', ['as' => 'quiz.show', 'uses' => 'QuizController@show']);

    // Quiz Questions
    Route::get('{quiz}/question/new', ['as' => 'question.create', 'uses' => 'QuizQuestionController@create']);
    Route::post('{quiz}/question/new', ['as' => 'question.store', 'uses' => 'QuizQuestionController@store']);
    Route::get('question/{question}/{quiz}', ['as' => 'question.show', 'uses' => 'QuizQuestionController@show']);

    // Quiz Answers
    Route::post('answer/{question}/save', ['as' => 'answer.store', 'uses' => 'QuizAnswerController@store']);
});

// All Quizzes
Route::get('/', ['uses' => 'Admin\QuizController@index']);

// Take Quiz
Route::get('{quiz}/start', ['as' => 'quiz.start', 'uses' => 'TakeQuizController@start']);

// Submit Quiz
Route::post('{quiz}/submit', ['as' => 'quiz.submit', 'uses' => 'QuizResultsController@store']);

// Quiz Results
Route::get('{quiz}/results', ['as' => 'quiz.results', 'uses' => 'QuizResultsController@index']);

