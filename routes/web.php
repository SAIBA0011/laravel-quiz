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

Route::get('/', ['uses' => 'QuizController@index']);

Auth::routes();

// Quiz Controller
Route::group(['as' => 'quiz.', 'prefix' => 'quiz'], function (){
    Route::get('/', ['as' => 'index', 'uses' => 'QuizController@index']);
    Route::get('create', ['as' => 'create', 'uses' => 'QuizController@create']);
    Route::post('store', ['as' => 'store', 'uses' => 'QuizController@store']);
    Route::get('show/{quiz}', ['as' => 'show', 'uses' => 'QuizController@show']);
});

// Quiz Question Controller
Route::group(['as' => 'questions.', 'prefix' => 'questions'], function (){
    Route::get('{question}/{quiz}', ['as' => 'show', 'uses' => 'QuizQuestionController@show']);
    Route::post('{quiz}/store', ['as' => 'store', 'uses' => 'QuizQuestionController@store']);
});

// Quiz Question Answer Controller
Route::group(['as' => 'options.', 'prefix' => 'options'], function (){
    Route::get('{question}/{quiz}/show', ['as' => 'show',  'uses' => 'QuizQuestionOptionController@show']);
});
