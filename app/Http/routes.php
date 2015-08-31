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

    Route::get('/task/edit/{id}',
        ['as'   =>  'task.edit',
         'uses' =>  'TasksController@taskEdit']);

    Route::patch('/task/edit/{id}',
        ['as'   =>  'task.editPatch',
         'uses' =>  'TasksController@taskEditPatch']);

    Route::get('/timetable',
        ['as'   =>  'timetable',
         'uses' =>  'TimeTableController@timeTableShow']);

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


Route::get('/regions', function(){
    ini_set('max_execution_time', 300); //300 seconds = 5 minutes

    DB::table('areas')->delete();
    DB::table('towns')->delete();

    $regions = api('database.getRegions', [
        'country_id'    =>  2,
    ]);

    $i = 0;

    foreach($regions['response'] as $region){
        $i += 1;
        $towns = api('database.getCities', [
            'country_id'    =>  2,
            'region_id' => $region['region_id'],
            'count'     => 1000
        ]);

        foreach($towns['response'] as $town) {
            $area = App\Models\Area::firstOrCreate([
                'name' => isset($town['area']) ? $town['area'] : $town['title'],
                'region_id' => isset(App\Models\Region::where('name', '=', $town['region'])->first()->id) ? App\Models\Region::where('name', '=', $town['region'])->first()->id : 0,
            ]);

            App\Models\Town::create([
                'name' => $town['title'],
                'area_id' => $area->id,
            ]);
        }

        sleep(5);

        if($i == 13){
            break;
        }
    }


});

Route::get('/alltowns', function(){
    $towns = [];

    $regions = api('database.getRegions', [
        'country_id'    =>  2,
    ]);

    foreach($regions['response'] as $region){
        $towns[] = api('database.getCities', [
            'country_id'    =>  2,
            'region_id' => $region['region_id'],
            'count'     => 1000

        ]);
        dd($towns);
    }

});

//function api($method, $params = [])
//{
//    $url = 'https://api.vk.com/method/' . $method . '?' . http_build_query($params);
//    $response = file_get_contents($url);
//    return json_decode($response, true);
//}