<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function($view) {
            View::share('user', Auth::user());
        });

        require base_path() . '/resources/macros/activeMacro.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->bind('App\Ioc\Driver',  'App\Ioc\GitDriver');
    }
}
