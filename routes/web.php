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

/*Route::middleware(['auth', 'tasklock.cancel'])->group(function () {
    Route::get('/', 'HomeController@index')->name('forms');
    //Route::get('response', 'ResponseController@index');
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
        Route::post('reports/{id}', 'ResponseController@export');
        Route::get('reports', 'ResponseController@forms');
        Route::get('reporting', 'ResponseController@forming');
        
        Route::get('unassign/{user_id}/{group_id}', 'UserController@unassign');
        Route::get('/list_all_disposes','ResponseController@listdisposes');
        Route::get('/diposes/edit/{id}','ResponseController@edit_dispose');
        Route::post('/update_dispose/{id}','ResponseController@update_dispose');
        Route::get('/logs','ResponseController@logs_check');
        Route::get('/diposes/trash/{id}','ResponseController@delete_dispose');
        Route::get('/form_from_group','GroupController@get_gropuid_for_form');
        Route::get('getFormsforId/{id}','GroupController@getform');
        Route::get('getResponseforFormid/{id}','GroupController@getresponse');
        Route::get('getDateforFormid/{id}','GroupController@getresponsedate');
        Route::get('getResponsefordate/{id}','GroupController@getresponsefordate');
        //Route::get('/edit_responses/{id}','GroupController@getresponseforedit');
        Route::get('/edit_responses/{id}/{form_id}/{user_id}','GroupController@getresponseforedit');
        Route::post('/updateresponse/{id}','GroupController@updateresponse');
        Route::get('/exporting', 'GroupController@exportAssignedID');
        Route::get('admin_access','GroupController@admin_access');
        Route::post('/get_admin_access_users','UserController@get_users');
        
        Route::get('/email', 'GroupController@sendEmail');
        

    });
});

//Route::get('login', 'AuthController@index')->name('login');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::get('ping', 'PingController@ping');

Route::get('/sendbasicemail','GroupController@basic_email');
Route::get('deleteauto', 'JobController@autodelete');
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
        Route::post('reports/{id}', 'ResponseController@export');
        Route::get('reports', 'ResponseController@forms');
        Route::resource('users', 'UserController');
        Route::resource('groups', 'GroupController');
        Route::get('unassign/{user_id}/{group_id}', 'UserController@unassign');




        Route::get('/form_from_group','GroupController@get_gropuid_for_form');
        Route::get('getFormsforId/{id}','GroupController@getform');
        Route::get('getResponseforFormid/{id}','GroupController@getresponse');
        Route::get('getDateforFormid/{id}','GroupController@getresponsedate');
        Route::get('getResponsefordate/{id}','GroupController@getresponsefordate');
        //Route::get('/edit_responses/{id}','GroupController@getresponseforedit');
        Route::get('/edit_responses/{id}/{form_id}/{user_id}','GroupController@getresponseforedit');
        Route::post('/updateresponse/{id}','GroupController@updateresponse');
    });
});

Route::get('login', 'AuthController@index')->name('login');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::get('ping', 'PingController@ping');



