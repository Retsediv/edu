<?php

namespace App\Providers;


use App\Repositories\Task\TaskInterface;
use App\Repositories\Task\TaskRepository;
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
        require base_path() . '/app/helpers.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TaskInterface::class,  TaskRepository::class);
    }
}
