<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventFormRequest;
use App\Models\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function events(Request $request)
    {
        $events = new Event();

        $school_id = $request->user()->school->id;
        $events = $events->getEventsBySchool($school_id);

        return view('page.events', ['events' => $events]);
    }

    /**
     * @param EventFormRequest $request
     * @return redirect
     */
    public function createEvent(EventFormRequest $request)
    {
        Event::create([
            'name'  =>  $request->name,
            'data_range'    =>  $request->dateRange,
            'description'   =>  $request->description,
            'user_id'       =>  $request->user()->id,
            'school_id'     =>  $request->user()->userClass->school->id
        ]);

        flash()->success('Ви успішно добавили нову подію!');
        return back();
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        flash('Ви успішно видалили подію!');
        return back();
    }

    /**
     * Helper function
     * @param $date
     * @return mixed
     */
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
