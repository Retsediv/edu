<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseLesson;
use App\Models\Test;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LessonController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @param $courseId
     * @return \Illuminate\Http\Response
     */
    public function create($courseId)
    {
        $userId = Auth::user()->id;
        $tests = Test::where('user_id', '=', $userId)->get();
        $course = Course::find($courseId);

        return view('course.lesson.create', ['course' => $course, 'tests' => $tests]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $courseId)
    {
        CourseLesson::create([
            'title' => $request->title,
            'body' => $request->body,
            'course_id' => $courseId,
            'test_id' => $request->test_id
        ]);

        return redirect(route('courses.get', ['id' => $courseId]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentLesson = CourseLesson::find($id);
        $courseId = $currentLesson->course()->get()->first()->id;

        $lessons = CourseLesson::where('course_id', '=', $courseId)->get();

        return view('course.lesson.show',  ['currentLesson' => $currentLesson, 'lessons' => $lessons]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
