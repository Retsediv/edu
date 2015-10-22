<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TimeTableController extends Controller
{

    /**
     * Show a timeTable of lessons for all users
     * @return \Illuminate\View\View
     */
    public function timeTableShow()
    {
        return view('timetable.index');
    }

    /**
     * Show form for teachers or director to create or edit timetalbe
     * @return \Illuminate\View\View
     */
    public function timeTableCreate()
    {
        return view('timetable.create');
    }

    /**
     * Edit or create timetable. Getting a POST request, update the data in database.
     * @param Request $request
     */
    public function timeTableCreatePost(Request $request)
    {
        dd($request);
    }
}
