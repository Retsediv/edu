<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseLesson;
use Auth;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('course.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $image = Input::file('image');

        $filename = Hash::make(time()) . '.' . $image->getClientOriginalExtension();
        $path = '/images/courses/';
        $moveDirectory = public_path($path);
        $image->move($moveDirectory, $filename);

        /* Resize image if it width is more than 400px */
        if (Image::make($moveDirectory . $filename)->width() > 400) {
            $image = Image::make($moveDirectory . $filename);
            $image->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save($moveDirectory . $filename);
        }

        /* Create new course */
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path . $filename,
            'user_id' => $request->user()->id
        ]);

        flash()->success('Ви успішно добавили новий курс!');
        return redirect(route('courses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $lessons = $course->lessons()->get();

        $marks = Auth::user()->marks;

        return view('course.show', ['course' => $course, 'lessons' => $lessons, 'marks' => $marks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Join a member to couser
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function join($id)
    {
        $course = Course::find($id);
        $course->members()->attach(Auth::user()->id);

        return redirect(route('courses'));
    }

}
