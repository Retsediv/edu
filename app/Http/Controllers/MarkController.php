<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Mark;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @param $courseId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($courseId)
    {
        $course = Course::findOrFail($courseId);
        $lessons = $course->lessons;
        $members = $course->users;

       return view('mark.show', ['members' => $members, 'lessons' => $lessons, 'course' => $course]);
    }

    public function store(Request $request)
    {
        Mark::create([
            'user_id' => $request->user_id,
            'lesson_id' => $request->lesson_id,
            'mark' => $request->mark,
            'description' => $request->description
        ]);

        flash()->success('Ви успішно поставили оцінку учню!');
        return redirect()->back();

    }

    /**
     * @param $lessonId
     * @param $mark
     */
    public function forTest($lessonId, $mark)
    {
        $m = Mark::where('user_id', '=', Auth::user()->id)->where('lesson_id', '=', $lessonId);
        if (!$m) {
            Mark::firstOrCreate([
                'user_id' => Auth::user()->id,
                'lesson_id' => $lessonId,
                'mark' => $mark,
                'description' => 'За проходження тестування за урок'
            ]);
        }
    }
}
