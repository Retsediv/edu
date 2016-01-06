<?php

use Faker\Factory as Faker;
use App\Models\Blog;

/* DASHBOARD */
Route::group(['middleware' => ['auth', 'role:teacher,student,director']], function () {

    Route::get('/',
        ['as' => 'home',
            'uses' => 'HomeController@index']);


    Route::get('/events',
        ['as' => 'events',
            'uses' => 'EventsController@events']);

    Route::post('/events',
        ['as' => 'events',
            'uses' => 'EventsController@createEvent']);


    /* Tasks routes */
    Route::get('/tasks',
        ['as' => 'tasks',
            'uses' => 'TasksController@tasksList']);

    Route::get('api/tasks/all', 'TasksController@getAllTasks');
    Route::post('api/tasks/create', 'TasksController@createTask');
    Route::post('api/tasks/done', 'TasksController@taskDone');
    Route::post('api/tasks/remove', 'TasksController@taskRemove');
    Route::post('api/tasks/edit', 'TasksController@taskEdit');


    /* Timetable routes */
    Route::get('/timetable',
        ['as' => 'timetable',
            'uses' => 'TimeTableController@timeTableShow']);

    Route::get('/timetable/create',
        ['as' => 'timetable.create',
            'uses' => 'TimeTableController@timeTableCreate']);

    Route::post('/timetable/create',
        ['as' => 'timetable.create',
            'uses' => 'TimeTableController@timeTableCreatePost']);


    /* Polling routes */

    Route::get('/poll',
        ['as' => 'poll',
         'uses' => 'PollController@index']);

    Route::get('/poll/{id}',
        ['as' => 'poll.one',
         'uses' => 'PollController@getTest']);

    Route::get('/api/poll/all', 'PollController@getAllTests');
    Route::get('/api/poll/{id}/answers', 'PollController@getAllAnswersToTest');
    Route::get('/api/poll/{id}/questions', 'PollController@getQuestions');
    Route::get('/api/poll/answer/{id}', 'PollController@getAnswersToQuestion');

    /* Blog routes */

    Route::get('/blog',
        ['as' => 'blog',
         'uses' => 'BlogController@index']);

    Route::get('/blog/create',
        ['as' => 'blog.create',
            'uses' => 'BlogController@create']);

    Route::post('/blog/create',
        ['as' => 'blog.create',
            'uses' => 'BlogController@postCreate']);

    Route::get('/blog/{id}',
        ['as' => 'blog.page',
         'uses' => 'BlogController@showPost']);




    Route::get('/api/blog/all', 'BlogController@getAll');

});

    /* AUTHENTIFICATION */

    Route::group(['namespace' => 'Auth'], function () {

        Route::get('/auth/login',
            ['as' => 'login',
                'uses' => 'AuthController@getLogin']);

        Route::post('/auth/login',
            ['as' => 'login',
                'uses' => 'AuthController@postLogin']);

        Route::get('/auth/register',
            ['as' => 'register',
                'uses' => 'AuthController@getRegister']);

        Route::post('/auth/register',
            ['as' => 'register',
                'uses' => 'AuthController@postRegister']);

        Route::get('/logout',
            ['as' => 'logout',
                'uses' => 'AuthController@getLogout']);

        Route::get('/password',
            ['as' => 'password',
                'uses' => 'PasswordController@getEmail']);

        Route::post('/password',
            ['as' => 'password',
                'uses' => 'PasswordController@postEmail']);

        Route::get('/password/reset/{token}',
            ['as' => 'reset',
                'uses' => 'PasswordController@getReset']);

        Route::post('password/reset',
            ['as' => 'reset',
                'uses' => 'PasswordController@postReset']);


    });

    /* (need fix) */
    Route::group(['namespace' => 'Auth'], function () {

        Route::post('auth/get/area', 'AuthController@getArea');
        Route::post('auth/get/town', 'AuthController@getTown');
        Route::post('auth/get/school', 'AuthController@getSchool');

    });

    /* ADD A NEW SCHOOL (Alpha version) */

    Route::get('addschool', [
        'as' => 'addschool',
        'uses' => 'AddSchoolController@index']);
    Route::post('addschool', [
        'as' => 'addschool',
        'uses' => 'AddSchoolController@addSchool']);