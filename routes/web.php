<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/exam/create', 'ExamController@create')->name('exam.create');
Route::post('/exam/store', 'ExamController@store')->name('exam.store');
Route::get('/exams', 'ExamController@index')->name('exam.index');
Route::get('/exam/attend/{id}', 'ExamController@attend')->name('exam.attend');

Route::get('/answer/{exam_id}/{user_id}', 'AnswerController@show')->name('answer.show');
Route::post('/answer/store/{exam_id}', 'AnswerController@store')->name('answer.store');

Route::get('/question/create', 'QuestionController@create')->name('question.create');
Route::post('/question/store', 'QuestionController@store')->name('question.store');

