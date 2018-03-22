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

Route::middleware(['auth', 'tasklock.cancel'])->group(function () {
    Route::get('/', 'HomeController@index')->name('forms');
    Route::get('response', 'ResponseController@index');
    Route::post('response', 'ResponseController@store');
    Route::get('task/skip/{id}', 'TaskController@skip');
    Route::get('task/{id}', 'TaskController@show');
    Route::post('task', 'TaskController@store');
    Route::get('queue/{id}', 'QueueController@show');
    Route::get('queue', 'QueueController@index');
    Route::get('response/{id}', 'ResponseController@create')->name('response');
    Route::middleware(['editor'])->group(function () {
        Route::resource('editor/forms', 'FormController');
        Route::resource('editor/questions', 'QuestionController');
        Route::resource('editor/optiongroups', 'OptionGroupController');
        Route::resource('editor/options', 'OptionController');
        Route::get('import', 'ImportController@index');
        Route::post('import', 'ImportController@process');
        Route::get('reports/{id}', 'ResponseController@responses');
        Route::get('reports/{id}/export/{range}', 'ResponseController@export');
        Route::get('reports', 'ResponseController@forms');
    });
});

Route::get('login', 'AuthController@index')->name('login');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::get('ping', 'PingController@ping');
