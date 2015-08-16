<?php

Route::group(['middleware' => ['auth', 'role:teacher,student']], function(){

    Route::get('/', function(){
        return view('index');
    });

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

Route::get('admin', function(){
    return view('student.index');
    return view('student.index');
});