<?php

Route::group(['middleware' => ['auth', 'role:teacher,student,director']], function(){

    Route::get('/',
        ['as'   =>  'home',
         'uses' =>  'HomeController@index']);

    Route::get('/events',
        ['as'   =>  'events',
         'uses' =>  'EventsController@events']);

    Route::post('/events',
        ['as'   =>  'events',
         'uses' =>  'EventsController@createEvent']);

    Route::get('/tasks',
        ['as'   =>  'tasks',
         'uses' =>  'TasksController@tasksList']);

    Route::post('/tasks',
        ['as'   =>  'task.create',
         'uses' =>  'TasksController@createTask']);

    Route::post('/task/done',
        ['as'   =>  'task.done',
         'uses' =>  'TasksController@taskDone']);

    Route::post('/task/remove',
        ['as'   =>  'task.remove',
         'uses' =>  'TasksController@taskRemove']);

});

Route::group(['namespace' => 'Auth'], function(){

    Route::get('/auth/login',
        ['as'  => 'login',
         'uses'=> 'AuthController@getLogin']);

    Route::post('/auth/login',
        ['as'  => 'login',
         'uses'=> 'AuthController@postLogin']);

    Route::get('/auth/register',
        ['as'   => 'register',
         'uses' => 'AuthController@getRegister']);

    Route::post('/auth/register',
        ['as'   => 'register',
         'uses' => 'AuthController@postRegister']);

    Route::get('/logout',
        ['as'   => 'logout',
         'uses' => 'AuthController@getLogout']);

    Route::get('/password',
        ['as'   => 'password',
         'uses' => 'PasswordController@getEmail']);

    Route::post('/password',
        ['as'   => 'password',
         'uses' => 'PasswordController@postEmail']);

    Route::get('/password/reset/{token}',
        ['as'   => 'reset',
         'uses' => 'PasswordController@getReset']);

    Route::post('/password/reset/{token}',
        ['as'   => 'reset',
         'uses' => 'PasswordController@postReset']);
});

Route::group(['namespace' => 'Auth'], function(){

    Route::post('auth/get/town', 'AuthController@getTown');
    Route::post('auth/get/school', 'AuthController@getSchool');

});
