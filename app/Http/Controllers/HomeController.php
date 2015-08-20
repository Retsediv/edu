<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Task;


class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tasks = Task::all();
        $events = Event::all();
        return view('page.index', ['tasks' => $tasks, 'events' => $events]);
    }

}