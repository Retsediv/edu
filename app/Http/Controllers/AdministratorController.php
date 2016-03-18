<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    protected $schoolId;

    public function __construct(Request $request)
    {
        $this->schoolId = $request->user()->school_id;
    }

    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users()
    {
       return view('admin.users');
    }

    /**
     * Display a listing of classes.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function classes()
    {
        return view('admin.classes');
    }

    /**
     * Api function to get all users from director's school
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsers(Request $request)
    {
        $users = User::where('school_id', '=', $this->schoolId)->with('userClass', 'roles')->paginate(10);

        return response()->json($users);
    }

    /**
     * Api function to get all classes from director's school
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getClasses(Request $request)
    {
        $classes = Classes::where('school_id', '=', $this->schoolId)->get();

        foreach($classes as $class){
            $class['count'] = User::where('class_id', '=', $class->id)->count();
        }

        return response()->json($classes);
    }

    /**
     * Api function to get all classes from director's school
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeClass(Request $request)
    {
        $className = $request->name;

        Classes::create([
            'name' => $className,
            'school_id' => $this->schoolId
        ]);
    }

    /**
     * Api function to get all classes from director's school
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @internal param $classId
     */
    public function deleteClass(Request $request)
    {
        $classId = $request->id;

        $class = Classes::findOrFail($classId);
        $class->delete();
    }
}
