<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventFormRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('student.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function events(Request $request)
    {
        $events = new Event();
        $events = $events->getEventsBySchool($request->user()->school_id);
        return view('student.events', ['events' => $events]);
    }

    /**
     * @param EventFormRequest $request
     */
    public function createEvent(EventFormRequest $request)
    {
        Event::create([
            'name'  =>  $request->name,
            'data_range'    =>  $this->getPrettyDate($request->dateRange),
            'description'   =>  $request->description,
            'user_id'       =>  $request->user()->id,
            'school_id'     =>  $request->user()->school->id
        ]);

        return back();
    }

    public function getPrettyDate($date)
    {
        $piece = explode(' - ', $date);
        if (strpos($piece[0], $piece[1]) == 0 )
        {
            return $piece[0];
        }
        return $date;
    }
}
