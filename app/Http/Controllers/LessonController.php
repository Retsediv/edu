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

        flash()->success('Ви успішно добавили новий урок!');
        return redirect(route('courses.get', ['id' => $courseId]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentLesson = CourseLesson::find($id);
        $test = $currentLesson->test_id ? Test::findOrFail($currentLesson->test_id): '';

        $courseId = $currentLesson->course->id;
        $lessons = CourseLesson::where('course_id', '=', $courseId)->get();

        return view('course.lesson.show',  [
            'currentLesson' => $currentLesson,
            'lessons' => $lessons,
            'test' => $test]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = CourseLesson::findOrFail($id);
        $course = $lesson->course;

        $userId = Auth::user()->id;
        $tests = Test::where('user_id', '=', $userId)->get();


        return view('course.lesson.edit', ['lesson' => $lesson, 'tests' => $tests, 'course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $lesson = CourseLesson::findOrFail($id);
        $lesson->fill($request->all());
        $lesson->save();

        flash()->success('Ви успішно змінили урок!');
        return redirect(route('lesson.get', ['id' => $id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = CourseLesson::findOrFail($id);
        $courseId = $lesson->course->id;

        $lesson->delete();

        flash()->success('Ви успішно видалили урок!');
        return redirect(route('courses.get', ['id' => $id]));
    }
}
