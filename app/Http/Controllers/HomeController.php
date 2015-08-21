<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Task;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks;

        $school_is = $request->user()->school->id;
        $events = new Event();
        $events = $events->getEventsBySchool($school_is);
        return view('page.index', ['tasks' => $tasks, 'events' => $events]);
    }

}